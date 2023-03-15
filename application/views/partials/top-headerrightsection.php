<div class="searchBox float-start">
                            <form action="<?php echo site_url('search-result')?>" method="post" id="search_profile">
                                <input type="search" name="search_val" placeholder="search memorisation profiles">

                                <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png"
                                    onClick="submitProfileForm()" />
                            </form>

                        </div>
                        <?php if(checkauth()){ ?>
                        <div class="notification">
                            <span><?php echo get_pending_count_user_wise() ?></span>
                            <a href="<?php echo (checkauth()) ? site_url('dashboard') : '#' ?>"><i class="fa-sharp fa-solid fa-bell"></i></a>
                        </div>

                        <?php } ?>
                        <div class="menu-btn d-table mx-2 float-start">

                            <a href="javascript:;" class="menu-btn-toggle"><span><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/Menu.png"
                                        class="menu-line"> <img
                                        src="<?php echo site_url('assets/frontend/') ?>images/Close.svg"
                                        class="close"></span></a>

                            <nav class="sidebar">

                                <?php $this->load->view('navigation') ?>

                            </nav>

                        </div>