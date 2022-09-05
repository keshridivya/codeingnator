<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
             <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Codeigniter Project</span>
             </a>
            <div class="nav_list">
                <a href="<?php echo base_url('Dashboard') ?>" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>

                <a href="<?php echo base_url('Registration') ?>" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Business
                        Registration</span> </a>

            </div>
        </div> 
        <a href="<?= base_url('logout') ?>" class="nav_link"> 
            <i class='bx bx-log-out nav_icon'></i> 
            <span class="nav_name">SignOut</span>
        </a>
    </nav>
</div>