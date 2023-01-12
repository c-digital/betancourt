<div class="testimonial2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <div class="testimonial2-text">
                    <span class="quotes-marks mark-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="70" viewBox="0 0 205 141">
                        <g>
                        <path d="M69.8 60.7C82.9 69.1 89.4 80.4 89.4 94.7 89.4 108.9 85.2 120.1 76.8 128.3 68.4 136.4 57.9 140.5 45.3 140.5 32.7 140.5 22.1 136.5 13.5 128.6 4.8 120.7 0.5 110.3 0.5 97.5 0.5 84.6 4.7 72.1 13.1 60L54.4 0.5 97.1 0.5 69.8 60.7ZM176.9 60.7C190 69.1 196.5 80.4 196.5 94.7 196.5 108.9 192.3 120.1 183.9 128.3 175.5 136.4 165 140.5 152.4 140.5 139.8 140.5 129.2 136.5 120.6 128.6 111.9 120.7 107.6 110.3 107.6 97.5 107.6 84.6 111.8 72.1 120.2 60L161.5 0.5 204.2 0.5 176.9 60.7Z"></path>
                        </g>
                        </svg>          
                    </span>
                    <span class="quotes-marks mark-right">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="70" viewBox="0 0 205 141">
                        <g>
                        <path d="M69.8 60.7C82.9 69.1 89.4 80.4 89.4 94.7 89.4 108.9 85.2 120.1 76.8 128.3 68.4 136.4 57.9 140.5 45.3 140.5 32.7 140.5 22.1 136.5 13.5 128.6 4.8 120.7 0.5 110.3 0.5 97.5 0.5 84.6 4.7 72.1 13.1 60L54.4 0.5 97.1 0.5 69.8 60.7ZM176.9 60.7C190 69.1 196.5 80.4 196.5 94.7 196.5 108.9 192.3 120.1 183.9 128.3 175.5 136.4 165 140.5 152.4 140.5 139.8 140.5 129.2 136.5 120.6 128.6 111.9 120.7 107.6 110.3 107.6 97.5 107.6 84.6 111.8 72.1 120.2 60L161.5 0.5 204.2 0.5 176.9 60.7Z"></path>
                        </g>
                        </svg>      
                    </span>
                    <h2 class="testimonial-quote mb-5">
                        <?= $testimonial[0]->quotation;?>
                    </h2>
                    <div class="testimonial2-author d-flex justify-content-center align-items-center">
                        <div class="testimonial2-author-name">
                           <?= $testimonial[0]->author_name;?>
                        </div>
                        <div class="testimonial2-author-link">
                            <a href="<?= $testimonial[0]->url;?>"><?= $testimonial[0]->url;?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>