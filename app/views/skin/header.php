 <!-- [ Preloader ] Start -->
 <div class="page-loader" id="loading">
        <div class="bg-success"></div>
    </div>
    <!-- [ Preloader ] End -->


    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <div class="app-brand demo text-center">
                    <img src="<?=base_url()?>img/logo-imip-warna.png" alt="Brand Logo" class="img-fluid">
                </div>
                <div class="sidenav-divider mt-0"></div>
                <ul class="sidenav-inner py-1">
                <?=$this->m_auth->menu_sidebar();?>
                </ul>
                
            </div>
<div class="layout-container">