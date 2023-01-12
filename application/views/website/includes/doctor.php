<div class="doctor-list">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                    <div class="section-title">
                        <h2><?= (!empty($section['doctor']['title'])?$section['doctor']['title']:null)?></h2>
                        <p><?= (!empty($section['doctor']['description'])?$section['doctor']['description']:null)?></p>
                    </div>
                </div>
            </div>
            <section class="grid">
                <?php 
                 if(!empty($doctors)){
                    foreach ($doctors as $doctor) {
                ?>
                    <a class="grid__item" href="<?= base_url('doctors/profile/'.$doctor->user_id)?>">
                        <h2 class="title title--preview"><?= $doctor->specialist;?></h2>
                        <div class="loader"></div>
                        <span class="dr-name"><?= $doctor->firstname .' '.$doctor->lastname;?> </span>
                        <div class="meta meta--preview">
                            <img class="meta__avatar" src="<?= (!empty($doctor->picture)?base_url($doctor->picture):base_url('assets_web/img/placeholder/profile.png'))?>" alt="author01" /> 
                            <span class="meta__position"><?= $doctor->name?></span>
                            <span class="meta__email"><?= $doctor->email?></span>
                        </div>
                    </a>
                <?php 
                    }
                 }
                ?>
            </section>
            <div class="text-center mt-5">
                <a href="<?= base_url('doctors')?>" class="btn btn-primary"><?= display('view_our_team_of_surgeons')?></a>
            </div>
        </div>
    </div>
</div>