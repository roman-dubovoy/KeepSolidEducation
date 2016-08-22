<body>
    <div class="container-for-last-advs">
        <?foreach ($lastAdvertisements as $lastAdvertisementsItem):?>
            <div class="advertisement-div">
                <p class="adv-header">
                    <? echo $lastAdvertisementsItem['title'];?>
                </p>
                <p class="creation-date-and-time">
                    <? echo date_create($lastAdvertisementsItem['creation_datetime'])->Format('j.m.Y H:i');?>
                </p>
                <img src="/img/unknown_adv.png" alt="unknown_adv" class="adv-photo">
                <p class="adv-text">
                    <? echo $lastAdvertisementsItem['description'];?>
                </p>
            </div>
        <? endforeach; ?>
    </div>
</body>
