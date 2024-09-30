<div class="w-full p-4 rounded-xl border-default-success grid grid-cols-[1.5fr__3fr] gap-1">
    <div class="p-2">
        <img src="/assets/images/landing-page-home/fitur/<?= $image; ?>" class="w-full">
    </div>
    <div>
        <h1 class="text-base font-medium"><?= $title; ?></h1>
        <p class="mt-2 text-xs"><?= $description; ?></p>

        <div class="mt-1">
            <a href="<?= $url; ?>">
                <button class="button px-4 rounded-md"><?= $button; ?></button>
            </a>
        </div>
    </div>
</div>