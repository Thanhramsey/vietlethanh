<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="section-title-wrapper text-center mb-4">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc(lang('Site.legal_docs')) ?></span>
            <h1 class="section-title"><?= esc(lang('Site.company_documents')) ?></h1>
        </div>

        <div class="d-flex flex-wrap gap-2 justify-content-center mb-4">
            <a href="<?= base_url('giay-to') ?>" class="btn rounded-pill <?= empty($activeSlug) ? 'btn-primary' : 'btn-outline-primary' ?>"><?= esc(lang('Site.all')) ?></a>
            <?php foreach ($categories as $cat): ?>
                <a href="<?= base_url('giay-to/loai/' . $cat['slug']) ?>" class="btn rounded-pill <?= ($activeSlug === $cat['slug']) ? 'btn-primary' : 'btn-outline-primary' ?>"><?= esc($cat['title']) ?></a>
            <?php endforeach; ?>
        </div>

        <div class="row g-4">
            <?php if (!empty($documents)): ?>
                <?php foreach ($documents as $doc): ?>
                    <?php
                    $file = $doc['file_attachment'] ?: $doc['pdf_attachment'];
                    $fileUrl = !empty($file) ? base_url('uploads/documents/' . $file) : '';
                    $imageUrl = !empty($doc['image']) ? base_url('uploads/documents/' . $doc['image']) : '';
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden">
                            <div class="ratio ratio-16x9 bg-white d-flex align-items-center justify-content-center border-bottom">
                                <?php if (!empty($imageUrl)): ?>
                                    <img src="<?= $imageUrl ?>" alt="<?= esc($doc['title']) ?>" style="width:100%;height:100%;object-fit:contain;">
                                <?php else: ?>
                                    <i class="bi bi-file-earmark-text text-primary" style="font-size:3rem;"></i>
                                <?php endif; ?>
                            </div>
                            <div class="card-body">
                                <span class="badge bg-primary-subtle text-primary mb-2"><?= esc($doc['category_title'] ?? lang('Site.documents')) ?></span>
                                <h5 class="fw-bold mb-2"><?= esc($doc['title']) ?></h5>
                                <?php if (!empty($doc['organization']) || !empty($doc['issue_date'])): ?>
                                    <div class="small text-muted mb-2">
                                        <?php if (!empty($doc['organization'])): ?><div><i class="bi bi-building me-1"></i><?= esc($doc['organization']) ?></div><?php endif; ?>
                                        <?php if (!empty($doc['issue_date'])): ?><div><i class="bi bi-calendar3 me-1"></i><?= date('d/m/Y', strtotime($doc['issue_date'])) ?></div><?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($fileUrl)): ?>
                                    <a href="<?= $fileUrl ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill"><?= esc(lang('Site.open_document')) ?> <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center text-muted py-5"><?= esc(lang('Site.no_matching_documents')) ?></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
