<div class="tab-pane fade <?= ($activeTab == 'saved') ? 'show active' : '' ?>" 
     id="v-pills-saved" 
     role="tabpanel" 
     aria-labelledby="v-pills-saved-tab">

    <h3 class="mb-4">Công việc đã lưu</h3>

    <?php if (empty($list_saved_recr)) { ?>

        <div class="my-3">
            <div class="employer-item text-center">
                Bạn chưa lưu công việc nào!
            </div>
        </div>

    <?php } else { ?>

        <?php foreach ($list_saved_recr as $item) { 
            $link_recr = "index.php?act=info_recr&id=" . $item['idrecr'];
        ?>

            <div class="employer-item position-relative" style="padding-right: 10px;">

                <img data-cfsrc="<?= checkCorpAvaNull($item['companyAvatar']) ?>"
                     src="<?= checkCorpAvaNull($item['companyAvatar']) ?>"
                     alt="Employer"
                     style="width: 70px; height: 70px; object-fit: cover;"
                     class="rounded-circle">

                <h3>
                    <a href="<?= $link_recr ?>" style="color: #5f5656;">
                        <?= $item['job'] ?>
                    </a>
                </h3>

                <ul>
                    <li>
                        <i class="flaticon-send"></i>
                        <?= $item['companyAddress'] ?>
                    </li>
                    <li>
                        <?= $item['start'] ?>
                    </li>
                </ul>

                <p><?= $item['level'] ?> / <?= $item['type'] ?></p>
                <p><?= $item['progLang'] ?></p>

                <div class="nav nav-pills d-flex justify-content-between">
                    <a href="<?= $link_recr ?>" 
                       class="nav-link text-white me-3 py-2 px-3 fw-bold bg-secondary bg-opacity-75" 
                       style="font-size: 13px; padding-bottom: 0;">
                        Thông tin chi tiết
                    </a>
                </div>

            </div>

        <?php } ?>

    <?php } ?>

</div>