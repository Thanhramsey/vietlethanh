<?php

namespace App\Controllers\Admin;

use App\Models\CertificateModel;
use App\Models\DocumentCategoryModel;

class Document extends AdminBaseController
{
    protected $documentModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->documentModel = new CertificateModel();
        $this->categoryModel = new DocumentCategoryModel();
    }

    public function index(): string
    {
        $documents = $this->documentModel
            ->select('certificates.*, document_categories.title AS category_title')
            ->join('document_categories', 'document_categories.id = certificates.category_id', 'left')
            ->orderBy('certificates.sort_order', 'ASC')
            ->orderBy('certificates.id', 'DESC')
            ->findAll();

        return view('admin/documents/index', [
            'title'     => 'Giấy tờ',
            'documents' => $documents,
        ]);
    }

    public function create(): string
    {
        return view('admin/documents/create', [
            'title'      => 'Thêm giấy tờ',
            'categories' => $this->categoryModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[2]|max_length[255]',
            'category_id' => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category_id' => (int) $this->request->getPost('category_id'),
            'issue_date'  => $this->request->getPost('issue_date') ?: null,
            'organization'=> $this->request->getPost('organization'),
            'sort_order'  => (int) ($this->request->getPost('sort_order') ?? 0),
            'status'      => (int) ($this->request->getPost('status') ?? 1),
            'created_by'  => session()->get('admin_id'),
        ];

        $upload = $this->uploadDocumentFile();
        if (!empty($upload['error'])) {
            return redirect()->back()->withInput()->with('error', $upload['error']);
        }
        $data = array_merge($data, $upload['data']);

        $this->documentModel->insert($data);

        return redirect()->to(base_url('admin/documents'))->with('success', 'Đã thêm giấy tờ.');
    }

    public function edit(int $id): string
    {
        $document = $this->documentModel->find($id);
        if (!$document) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Giấy tờ không tồn tại');
        }

        return view('admin/documents/edit', [
            'title'      => 'Sửa giấy tờ',
            'document'   => $document,
            'categories' => $this->categoryModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function update(int $id)
    {
        $document = $this->documentModel->find($id);
        if (!$document) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Giấy tờ không tồn tại');
        }

        $rules = [
            'title'       => 'required|min_length[2]|max_length[255]',
            'category_id' => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category_id' => (int) $this->request->getPost('category_id'),
            'issue_date'  => $this->request->getPost('issue_date') ?: null,
            'organization'=> $this->request->getPost('organization'),
            'sort_order'  => (int) ($this->request->getPost('sort_order') ?? 0),
            'status'      => (int) ($this->request->getPost('status') ?? 1),
            'updated_by'  => session()->get('admin_id'),
        ];

        $upload = $this->uploadDocumentFile();
        if (!empty($upload['error'])) {
            return redirect()->back()->withInput()->with('error', $upload['error']);
        }

        if (!empty($upload['data'])) {
            $oldFiles = [$document['image'] ?? null, $document['file_attachment'] ?? null, $document['pdf_attachment'] ?? null];
            foreach ($oldFiles as $oldFile) {
                if (!empty($oldFile) && file_exists(FCPATH . 'uploads/documents/' . $oldFile)) {
                    @unlink(FCPATH . 'uploads/documents/' . $oldFile);
                }
            }
            $data = array_merge($data, $upload['data']);
        }

        $this->documentModel->update($id, $data);

        return redirect()->to(base_url('admin/documents'))->with('success', 'Đã cập nhật giấy tờ.');
    }

    public function delete(int $id)
    {
        $document = $this->documentModel->find($id);
        if ($document) {
            $oldFiles = [$document['image'] ?? null, $document['file_attachment'] ?? null, $document['pdf_attachment'] ?? null];
            foreach ($oldFiles as $oldFile) {
                if (!empty($oldFile) && file_exists(FCPATH . 'uploads/documents/' . $oldFile)) {
                    @unlink(FCPATH . 'uploads/documents/' . $oldFile);
                }
            }
            $this->documentModel->delete($id);
        }

        return redirect()->to(base_url('admin/documents'))->with('success', 'Đã xóa giấy tờ.');
    }

    private function uploadDocumentFile(): array
    {
        $file = $this->request->getFile('attachment');
        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return ['data' => []];
        }

        $ext = strtolower((string) $file->getClientExtension());
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'pdf', 'doc', 'docx', 'xls', 'xlsx'];
        if (!in_array($ext, $allowed, true)) {
            return ['error' => 'File không hợp lệ. Chỉ chấp nhận ảnh, PDF, DOC, DOCX, XLS, XLSX.'];
        }

        if ($file->getSizeByUnit('kb') > 10240) {
            return ['error' => 'Kích thước file tối đa 10MB.'];
        }

        $dir = FCPATH . 'uploads/documents/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $mimeType = (string) $file->getClientMimeType();
        if ($mimeType === '') {
            $mimeMap = [
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'png' => 'image/png',
                'webp' => 'image/webp',
                'pdf' => 'application/pdf',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'xls' => 'application/vnd.ms-excel',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ];
            $mimeType = $mimeMap[$ext] ?? 'application/octet-stream';
        }

        $fileName = $file->getRandomName();
        $file->move($dir, $fileName);

        $data = [
            'file_attachment' => $fileName,
            'file_mime'       => $mimeType,
        ];

        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'], true)) {
            $data['image'] = $fileName;
        }

        if ($ext === 'pdf') {
            $data['pdf_attachment'] = $fileName;
        }

        return ['data' => $data];
    }
}
