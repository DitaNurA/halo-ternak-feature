<?php $pager->setSurroundCount(2); ?>

<div class="w-full flex-center gap-4">
    <a <?= $pager->hasPrevious() ? 'href="<?= $pager->getPrevious(); ?>"' : ''; ?> id="paginateLink">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
            </svg>
        </button>
    </a>

    <ul class="flex-center gap-6">
        <?php foreach ($pager->links() as $link) { ?>
            <li>
                <a href="<?= $link['uri']; ?>" class="<?= $link['active'] ? 'button-outline-primary px-3 font-medium py-1 rounded-md text-base' : 'font-medium text-base'; ?>"><?= $link['title']; ?></a>
            </li>
        <?php } ?>
    </ul>

    <a <?= $pager->hasNext() ? 'href="<?= $pager->getNext(); ?>"' : ''; ?> id="paginateLink">
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
        </button>
    </a>
</div>