<?php

use CodeIgniter\Pager\PagerRenderer;

/**
 * @var PagerRenderer $pager
 */
$pager->setSurroundCount(1);
?>

<?php if ($pager->hasPrevious() || $pager->hasNext()) : ?>
    <nav aria-label="Phan trang" class="admin-pagination-nav">
        <ul class="pagination pagination-sm mb-0">
            <?php if ($pager->hasPrevious()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="Trang dau">
                        <i class="bi bi-chevron-double-left"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getPrevious() ?>" aria-label="Trang truoc">
                        <i class="bi bi-chevron-left"></i>
                    </a>
                </li>
            <?php endif ?>

            <?php foreach ($pager->links() as $link) : ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a class="page-link" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>

            <?php if ($pager->hasNext()) : ?>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="Trang sau">
                        <i class="bi bi-chevron-right"></i>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Trang cuoi">
                        <i class="bi bi-chevron-double-right"></i>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif ?>
