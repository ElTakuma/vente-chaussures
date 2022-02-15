<?php include "../requetes/pagination.php";?>

<div>
    <nav style="display: flex; justify-content: center;">
        <ul class="pagination">
            <a href="../../chaussure/pages/chaussure-index.php?b_p=<?= $by_page ?>&page=<?= $currentPage - 1 ?>" class="<?= ($currentPage == 1) ? "disabled" : "" ?>">
                <li>
                    Precedent
                </li>
            </a>
            <?php for ($page = 1; $page <= $nbr_pages; $page++): ?>
                <a href="../../chaussure/pages/chaussure-index.php?b_p=<?= $by_page ?>&page=<?= $page ?>"  class=" <?= ($currentPage == $page) ? "active" : "" ?>">
                    <li>
                        <?= $page ?>
                    </li>
                </a>
            <?php endfor; ?>
            <a href="../../chaussure/pages/chaussure-index.php?b_p=<?= $by_page ?>&page=<?= $currentPage + 1 ?>" class=" <?=  ($currentPage == $nbr_pages) ? "disabled" : "" ?>">
                <li>
                    Suivant
                </li>
            </a>
        </ul>

    </nav>
</div>