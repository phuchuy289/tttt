<!-- img-slider -->
    
<div class="slideshow-container">
        <!-- Các slide ảnh -->
        <div class="slide fade">
            <img src="./assets/image/112.jpg" alt="Slide 1">
        </div>
        <div class="slide fade">
            <img src="./assets/image/123.jpg" alt="Slide 2">
            
        </div>
        <div class="slide fade">
            <img src="./assets/image/122.jpg" alt="Slide 3">
        </div>
        
        <!-- Nút điều hướng -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        
        <!-- Chấm chỉ số slide -->
        <div class="dots-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>
    </div>
 

<div class="">
    <section class="section">
        <div class="container">
            <div class="section_category">
                <p class="section_category_p">Hôm nay</p>
            </div>
            <div class="section_header">
                <h3 class="section_title">Giảm giá hôm nay</h3>
                <p id="demo"></p>
            </div>
            <!-- product1 -->
            <div class="products">

                <?php
                 $count = 0; // Đếm số sản phẩm đã hiển thị
                    foreach ($flashSaleProducts as $item) {
                        // logic
                        if ($count >= 8) break;
                        $discount_price = $item->price - ($item->price * $item->discount / 100);
                        ?>


                        <div class="card">
                            <a href="?controller=product&action=detail&id=<?= $item->id ?>">
                                <div class="card_top">
                                    <img
                                            src="<?= $item->img ?>"
                                            alt=""
                                            class="card_img"
                                    />
                                    <div class="card_top_icons">
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="card_top_icon"
                                        >
                                            <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                            />
                                        </svg>
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="card_top_icon"
                                        >
                                            <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                            />
                                            <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            />
                                        </svg>
                                    </div>
                                </div>
                                <div class="card_body">
                                    <h3 class="card_title"><?= $item->name ?></h3>
                                    <p class="card_price"><?= number_format($discount_price, 0, ',', '.') . ' Đ' ?></p>
                                    <div class="card_ratings">
                                        <div class="card_stars">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="w-6 h-6"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>

                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="w-6 h-6"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>

                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="w-6 h-6"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>

                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="w-6 h-6"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>

                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                    class="w-6 h-6"
                                            >
                                                <path
                                                        fill-rule="evenodd"
                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                        clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                        <p class="card_rating_numbers">(88)</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php
                        $count++; // Tăng biến đếm sau mỗi sản phẩm
                    }
                ?>

            </div>
            <div class="container_btn">
                <a href="?controller=product&action=index" class="container_btn_a">Xem tất cả sản phẩm</a>
            </div>
        </div>
    </section>
    

    
    <div class="container header_container">
        <img src="./assets/image/bg7.jpg" alt="" class="header_img" />
    </div>




    <section class="section">
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">Sản phẩm bán chạy</h3>
                <p id="demo"></p>
            </div>
            <!-- Swiper -->
            <div class="products">

                <?php
                 $count = 0; // Đếm số sản phẩm đã hiển thị
                foreach ($bestSellingProducts as $item) {
                    // logic
                    if ($count >= 8) break;
                    $discount_price = $item->price - ($item->price * $item->discount / 100);
                    ?>


                    <div class="card">
                        <a href="?controller=product&action=detail&id=<?= $item->id ?>">
                            <div class="card_top">
                                <img
                                        src="<?= $item->img ?>"
                                        alt=""
                                        class="card_img"
                                />
                                <div class="card_top_icons">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="card_top_icon"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                        />
                                    </svg>
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="card_top_icon"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                        />
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div class="card_body">
                                <h3 class="card_title"><?= $item->name ?></h3>
                                <p class="card_price"><?= number_format($discount_price, 0, ',', '.') . ' Đ' ?></p>
                                <div class="card_ratings">
                                    <div class="card_stars">
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <p class="card_rating_numbers">(88)</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    $count++; 
                }
                ?>

            </div>
            <div class="container_btn">
                <a href="?controller=product&action=index" class="container_btn_a">Xem tất cả sản phẩm</a>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="trending">
                <div class="trending_content">
                    <p class="trending_p">TECHNOVAS</p>
                    <h2 class="trending_title">Sản phẩm chất lượng giành cho bạn</h2>
                    <a href="?controller=product&action=index" class="trending_btn">Mua Ngay</a>
                </div>
                <img src="./assets/image/tech.webp" alt="" class="tech" />
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">Khám phá sản phẩm của chúng tôi</h3>
                <p id="demo"></p>
            </div>
            <div class="products">

                <?php
                 $count = 0; // Đếm số sản phẩm đã hiển thị
                foreach ($ourProducts as $item) {
                    if ($count >= 8) break;
                    // logic
                    $discount_price = $item->price - ($item->price * $item->discount / 100);
                    ?>


                    <div class="card">
                        <a href="?controller=product&action=detail&id=<?= $item->id ?>">
                            <div class="card_top">
                                <img
                                        src="<?= $item->img ?>"
                                        alt=""
                                        class="card_img"
                                />
                                <div class="card_top_icons">
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="card_top_icon"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                        />
                                    </svg>
                                    <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="card_top_icon"
                                    >
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"
                                        />
                                        <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>
                                </div>
                            </div>
                            <div class="card_body">
                                <h3 class="card_title"><?= $item->name ?></h3>
                                <p class="card_price"><?= number_format($discount_price, 0, ',', '.') . ' Đ' ?></p>
                                <div class="card_ratings">
                                    <div class="card_stars">
                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>

                                        <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6"
                                        >
                                            <path
                                                    fill-rule="evenodd"
                                                    d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                                    clip-rule="evenodd"
                                            />
                                        </svg>
                                    </div>
                                    <p class="card_rating_numbers">(88)</p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <?php
                    $count++; // Tăng biến đếm sau mỗi sản phẩm
                }
                ?>

            </div>
            <div class="container_btn">
                <a href="?controller=product&action=index" class="container_btn_a">Xem tất cả sản phẩm</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section_category">
                <p class="section_category_p">Nổi bật</p>
            </div>
            <div class="section_header">
                <h3 class="section_title">Hàng mới về</h3>
            </div>
            <div class="gallery">
                <div class="gallery_item gallery_item_1">
                    <img
                            src="./assets/image/gallery/gallery-6.webp"
                            alt=""
                            class="gallery_item_img"
                    />
                    <div class="gallery_item_content">
                        <div class="gallery_item_title">Iphone 17</div>
                        <p class="gallery_item_p">
                            Thiết kế đột phá & Hiệu năng vượt trội.
                        </p>
                        <a href="?controller=product&action=index" class="gallery_item_link">SHOP NOW</a>
                    </div>
                </div>
                <div class="gallery_item gallery_item_2">
                    <img
                            src="./assets/image/gallery/gallery-5.jpg"
                            alt=""
                            class="gallery_item_img"
                    />
                    <div class="gallery_item_content">
                        <div class="gallery_item_title">PC Gaming Đỉnh Cao</div>
                        <p class="gallery_item_p">
                        Hiệu năng cực đỉnh, Trải nghiệm mượt mà.
                        </p>
                        <a href="?controller=product&action=index" class="gallery_item_link">SHOP NOW</a>
                    </div>
                </div>
                <div class="gallery_item gallery_item_3">
                    <img
                            src="./assets/image/gallery/gallery-7.jpg"
                            alt=""
                            class="gallery_item_img"
                    />
                    <div class="gallery_item_content">
                        <div class="gallery_item_title">iPad Mới Nhất</div>
                        <p class="gallery_item_p">
                        Sáng tạo không giới hạn, Giải trí bất tận.
                        </p>
                        <a href="?controller=product&action=index" class="gallery_item_link">SHOP NOW</a>
                    </div>
                </div>
                <div class="gallery_item gallery_item_4">
                    <img
                            src="./assets/image/gallery/gallery-8.jpg"
                            alt=""
                            class="gallery_item_img"
                    />
                    <div class="gallery_item_content">
                        <div class="gallery_item_title">Laptop Gaming Mạnh Mẽ</div>
                        <p class="gallery_item_p">
                        Chiến game đỉnh cao, Di động mọi lúc.
                        </p>
                        <a href="?controller=product&action=index" class="gallery_item_link">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<section class="section">
    <div class="container services_container">
        <div class="service">
            <img src="./assets/image/icons/service-1.png" alt="" class="service_img" />
            <h3 class="service_title">GIAO HÀNG NHANH VÀ MIỄN PHÍ</h3>
            <p class="service_p"> Miễn phí vận chuyển cho mọi đơn hàng toàn quốc.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-2.png" alt="" class="service_img" />
            <h3 class="service_title">HỖ TRỢ 24/7</h3>
            <p class="service_p">Đội ngũ chăm sóc khách hàng luôn sẵn sàng hỗ trợ bạn mọi lúc.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-3.png" alt="" class="service_img" />
            <h3 class="service_title">CHÍNH SÁCH BẢO HÀNH</h3>
            <p class="service_p"> Cam kết bảo hành chính hãng cho tất cả sản phẩm.</p>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container footer_container">
        <div class="footer_item">
            <a href="#" class="footer_logo">TECHNOVAS</a>
            <div class="footer_p">
                TECHNOVAS là thương hiệu tiên phong đến từ Tập đoàn VTECH với gần 40 năm kinh nghiệm trong việc sản xuất và xuất khẩu linh kiện điện tử và thiết bị thông minh đạt chuẩn quốc tế.
            </div>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Dịch Vụ</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Chính Sách Bán Hàng</li>
                <li class="li footer_list_item">Chính Sách Giao Hàng & Lắp Đặt</li>
                <li class="li footer_list_item">Chính Sách Đổi Trả</li>
                <li class="li footer_list_item">Chính Sách Bảo Hành & Bảo Trì</li>
            </ul>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Account</li>
                <li class="li footer_list_item">Login / Register</li>
                <li class="li footer_list_item">Cart</li>
                <li class="li footer_list_item">Shop</li>
            </ul>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Privacy policy</li>
                <li class="li footer_list_item">Terms of use</li>
                <li class="li footer_list_item">FAQ's</li>
                <li class="li footer_list_item">Contact</li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">Copyright TECHNOVAS 2025. All right reserved</p>
        </div>
    </div>
</footer>