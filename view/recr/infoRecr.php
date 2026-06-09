<div class="page-title-area two">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="left">
                            <div style="width: 100px; height: 100px; border: 3px solid white" class="overflow-hidden rounded-circle mb-3">
                                <img src='<?= checkCorpAvaNull($avatar) ?>' alt='user'>
                            </div>
                            <h2><?= $job ?></h2>
                            <ul>
                                <li>
                                    <i class="bx bx-pie-chart-alt-2"></i>
                                    <?= $progLang ?>
                                </li>
                                <li>
                                    <i class="bx bx-time"></i>
                                    <?= $start ?>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right">

                            <?php if (isset($_SESSION['username'])) { ?>

    <a class="cmn-btn <?= isset($_SESSION['username']['role']) && $_SESSION['username']['role'] !== 2 ? "d-none" : '' ?>"
       href="#"
       data-bs-toggle="modal"
       data-bs-target="#myModal">
        Ứng tuyển
        <i class="bx bx-plus"></i>
    </a>

    <?php
$isSaved = false;

if(isset($_SESSION['username']))
{
    $isSaved = check_saved_recr(
        $_SESSION['username']['id'],
        $id
    );
}
?>

<?php if($isSaved){ ?>

    <a href="index.php?act=unsave_recr&id=<?= $id ?>"
       class="btn btn-danger">
        <i class="bx bx-bookmark-minus"></i>
        Bỏ lưu
    </a>

<?php } else { ?>

    <a href="index.php?act=save_recr&id=<?= $id ?>"
       class="btn btn-info">
        <i class="bx bx-bookmark-plus"></i>
        Lưu công việc
    </a>

<?php } ?>

                            <?php } else { ?>
                                <a class="cmn-btn"
                                   href="index.php?act=signin"
                                   onclick="return confirm('Bạn cần đăng nhập trước');">
                                    Ứng tuyển
                                    <i class="bx bx-plus"></i>
                                </a>
                            <?php } ?>

                         <?php if(isset($_SESSION['username']) && $_SESSION['username']['role'] == 1){ ?>

<div class="mt-3">

    <?php if($status == 0){ ?>

        <a href="index.php?act=recr_status&id=<?= $id ?>&status=1"
           class="btn btn-success me-2">
            <i class="fa-solid fa-check"></i>
            Duyệt
        </a>

        <a href="index.php?act=recr_status&id=<?= $id ?>&status=2"
           class="btn btn-danger">
            <i class="fa-solid fa-xmark"></i>
            Từ chối
        </a>

    <?php } elseif($status == 1){ ?>

        <button class="btn btn-success" disabled>
            Đã duyệt
        </button>

        <a href="index.php?act=recr_status&id=<?= $id ?>&status=2"
           class="btn btn-danger">
            Từ chối
        </a>

    <?php } else { ?>

        <button class="btn btn-danger" disabled>
            Đã từ chối
        </button>


        <a href="index.php?act=recr_status&id=<?= $id ?>&status=1"
           class="btn btn-success">
            Duyệt lại
        </a>

    <?php } ?>

</div>

<?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ứng tuyển <span style="color : var(--secondary);"><?= $job ?></span></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="d-flex justify-content-between align-content-center">
                    <h5>Thông tin</h5>
                    <button onclick="editCV()" class="btn btn-outline-secondary" style="font-size: 13px;">
                        <i class="fa-solid fa-pen me-2"></i> Chỉnh sửa hồ sơ
                    </button>
                </div>

                <div class="row p-2 m-1 mt-3" style="border: 1px dashed var(--secondary); height: 150px;">
                    <div class="col-lg-8 d-flex flex-column">
                        <p class="fs-6 mb-0">Họ và tên : <?= $_SESSION['username']['name'] ?></p>
                        <p class="fs-6 mb-0">SĐT : <?= $_SESSION['username']['phone'] ?></p>
                        <p class="fs-6 mb-0">Email : <?= $_SESSION['username']['email'] ?></p>
                        <p class="fs-6 mb-0">Địa chỉ : <?= $_SESSION['username']['address'] ?></p>
                        <p><i class="fa-solid fa-ellipsis"></i></p>
                    </div>

                    <div class="col-lg-4">
                        <img src='<?= checkUserAvaNull($_SESSION['username']['avatar']) ?>'
                             alt='user'
                             class="w-50 h-75 mt-2 rounded float-end img-fluid">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <form action="index.php?act=apply_job" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="idRecr" value="<?= $id ?>">
                    <input type="hidden" name="idCV" value="<?= $infoCv['id'] ?>">

                    <span class="text-white" id="deletePDF" style="display: none;">
                        <i class="fa-solid fa-xmark"></i>
                    </span>

                    <a id="openPDFLink" href="#" target="_blank" style="display: none;">
                        <span class="text-white">
                            <i class="fa-solid fa-folder-open"></i> Chi tiết
                        </span>
                    </a>

                    <label id="labelPDF" for="attachCv" class="custom-file-upload m-0">
                        <span>Đính kèm <i class="fa-solid fa-file-word"></i> hoặc <i class="fa-solid fa-file-pdf"></i></span>
                        <input type="file" name="attach" accept=".pdf, .doc, .docx" id="attachCv" class="p-0 m-0">
                    </label>

                    <button type="submit" name="applyjob" class="btn text-white m-0" data-bs-dismiss="modal" style="background-color: var(--secondary);">
                        Nộp hồ sơ
                    </button>
                </form>

                <script>
                    const attach = document.getElementById('attachCv');
                    const labelPDF = document.getElementById('labelPDF');
                    const openPDFLink = document.getElementById('openPDFLink');
                    const label = document.querySelector('#labelPDF span');

                    attach.addEventListener('change', (event) => {
                        const file = event.target.files[0];

                        if (file.size > 0 && file.size <= 10000000) {
                            const fileName = attach.files[0].name;
                            label.innerHTML = `<i class="fa-solid fa-file-export"></i> ` + fileName;
                            openPDFLink.href = URL.createObjectURL(file);
                            deletePDF.style.display = 'inline';
                            openPDFLink.style.display = 'inline';
                            openPDFLink.onclick = () => window.open(openPDFLink.href, '_blank');
                        } else {
                            alert('Vượt kích thước cho phép\n[ ! ] Kích thước tệp tối đa 10 MB');
                            attach.value = '';
                        }
                    });

                    deletePDF.addEventListener('click', () => {
                        label.innerHTML = `Đính kèm <i class="fa-solid fa-file-word"></i> hoặc <i class="fa-solid fa-file-pdf"></i>`;
                        attach.value = '';
                        deletePDF.style.display = 'none';
                        openPDFLink.style.display = 'none';
                    });
                </script>
            </div>
        </div>
    </div>
</div>

<?php include "applyCv/demoCv.php"; ?>

<div class="job-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="details-item">

                    <div class="details-inner">
                        <h3>Miêu tả công việc</h3>
                        <ul>
                            <?php
                            $des_arr = explode("\n", $description);
                            for ($i = 0; $i < count($des_arr); $i++) {
                                echo "<li><i class='bx bx-message-square-check me-2'></i>" . $des_arr[$i] . "</li>";
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="details-inner">
                        <h3>Giới thiệu công ty</h3>
                        <p><?= $introduce ?></p>
                    </div>

                    <div class="details-inner">
                        <h3>Yêu cầu công việc</h3>
                        <ul>
                            <?php
                            $req_arr = explode("\n", $request);
                            for ($i = 0; $i < count($req_arr); $i++) {
                                echo "<li><i class='bx bx-message-square-check me-2'></i>" . $req_arr[$i] . "</li>";
                            }
                            ?>
                        </ul>
                    </div>

                    <div class="details-inner">
                        <h3>Quyền lợi</h3>
                        <ul>
                            <?php
                            $ben_arr = explode("\n", $benefits);
                            for ($i = 0; $i < count($ben_arr); $i++) {
                                echo "<li><i class='bx bx-message-square-check me-2'></i>" . $ben_arr[$i] . "</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>

                <div class="job-details-related pb-70" style="background-color: #fff; padding-top: 40px;">
                    <div class="section-title">
                        <h2>Việc làm tương tự</h2>
                    </div>

                    <?php
                    if (empty($val_c)) {
                        echo "<div class='my-3'>
                                <div class='employer-item text-center'>
                                    Không có việc làm tương tự !
                                </div>
                              </div>";
                    } else {
                        foreach ($val_c as $r) {
                            extract($r);
                            $link_recr = "index.php?act=info_recr&id=" . $id;
                    ?>
                            <div class="employer-item">
                                <img data-cfsrc='<?= checkCorpAvaNull($avatar) ?>'
                                     alt='Employer'
                                     style='width: 70px; height: 70px; object-fit: cover;'
                                     class="rounded-circle">

                                <h3>
                                    <a href="<?= $link_recr ?>" class="text-dark"><?= $job ?></a>
                                </h3>

                                <ul>
                                    <li>
                                        <i class="flaticon-send"></i>
                                        <?= $address ?>
                                    </li>
                                    <li><?= $start ?></li>
                                </ul>

                                <p><?= $name ?></p>

                                <span class="span-one" style="background-color: var(--secondary);">
                                    <a href="<?= $link_recr ?>" class="text-white">Ứng tuyển</a>
                                </span>

                                <span class="span-two"><?= $type ?></span>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="widget-area">
                    <div class="information widget-item">
                        <h3>Chi tiết</h3>
                        <ul>
                            <li>
                                <h4>Mức lương thỏa thuận</h4>
                                <span><?= $salary ?></span>
                            </li>

                            <li>
                                <h4>Địa điểm</h4>
                                <span><?= $address ?></span>
                            </li>

                            <li>
                                <h4>Ngày đăng</h4>
                                <span><?= $start ?></span>
                            </li>

                            <li>
                                <h4>Kinh nghiệm yêu cầu</h4>
                                <span><?= $exp ?> Years</span>
                            </li>

                            <li>
                                <h4>Ngôn ngữ lập trình</h4>
                                <span><?= $progLang ?></span>
                            </li>

                            <li>
                                <h4>Cấp độ</h4>
                                <span><?= $level ?></span>
                            </li>

                            <li>
                                <h4>Hình thức làm việc</h4>
                                <span><?= $type ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>