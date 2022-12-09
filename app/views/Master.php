<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost/quanlynhanvien/" target="_parent">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="public/js/calendar/lib/main.js"></script>
    <link rel="stylesheet" href="public/js/calendar/lib/main.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="public/js/jquery.js"></script>
    <link rel="stylesheet" href="public/style/main.css">
    <link rel="icon" type="image/x-icon" href="./public/images/title.ico">
    <title>Quản Lý Nhân Viên</title>
</head>

<body>
    <div class="loading_main">
        <div class="loader">
            <div class="inner one"></div>
            <div class="inner two"></div>
            <div class="inner three"></div>
        </div>
    </div>
    <main class="main">
        <aside class="side_bar">
            <div class="logo">
                <svg width="68" height="29" viewBox="0 0 68 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.072 22H0.496V0.655998H3.152V19.632H13.072V22ZM28.313 20.048C26.9263 21.6053 25.081 22.384 22.777 22.384C20.473 22.384 18.617 21.6053 17.209 20.048C15.8223 18.4907 15.129 16.56 15.129 14.256C15.129 11.952 15.8223 10.032 17.209 8.496C18.617 6.93867 20.473 6.16 22.777 6.16C25.081 6.16 26.9263 6.93867 28.313 8.496C29.721 10.032 30.425 11.952 30.425 14.256C30.425 16.56 29.721 18.4907 28.313 20.048ZM19.001 18.512C19.9397 19.664 21.1983 20.24 22.777 20.24C24.3557 20.24 25.6037 19.664 26.521 18.512C27.4383 17.3387 27.897 15.92 27.897 14.256C27.897 12.592 27.4383 11.184 26.521 10.032C25.6037 8.88 24.3557 8.304 22.777 8.304C21.1983 8.304 19.9397 8.89067 19.001 10.064C18.0837 11.216 17.625 12.6133 17.625 14.256C17.625 15.92 18.0837 17.3387 19.001 18.512ZM40.5455 28.272C39.1802 28.272 38.0175 28.1013 37.0575 27.76C36.0975 27.44 35.1802 26.8427 34.3055 25.968L35.5215 24.176C36.6948 25.584 38.3695 26.288 40.5455 26.288C41.9748 26.288 43.1588 25.904 44.0975 25.136C45.0362 24.3893 45.5055 23.2267 45.5055 21.648V19.44C44.9295 20.2507 44.1828 20.912 43.2655 21.424C42.3482 21.936 41.3668 22.192 40.3215 22.192C38.2735 22.192 36.6095 21.4773 35.3295 20.048C34.0708 18.5973 33.4415 16.6453 33.4415 14.192C33.4415 11.7387 34.0708 9.78667 35.3295 8.336C36.6095 6.88533 38.2735 6.16 40.3215 6.16C42.4335 6.16 44.1615 7.06667 45.5055 8.88V6.544H47.9055V21.552C47.9055 23.92 47.2122 25.6267 45.8255 26.672C44.4388 27.7387 42.6788 28.272 40.5455 28.272ZM40.8975 20.08C41.8148 20.08 42.7002 19.8347 43.5535 19.344C44.4282 18.8533 45.0788 18.256 45.5055 17.552V10.8C45.0788 10.096 44.4388 9.50933 43.5855 9.04C42.7322 8.54933 41.8362 8.304 40.8975 8.304C39.3615 8.304 38.1455 8.848 37.2495 9.936C36.3748 11.024 35.9375 12.4427 35.9375 14.192C35.9375 15.92 36.3855 17.3387 37.2815 18.448C38.1775 19.536 39.3828 20.08 40.8975 20.08ZM65.0005 20.048C63.6138 21.6053 61.7685 22.384 59.4645 22.384C57.1605 22.384 55.3045 21.6053 53.8965 20.048C52.5098 18.4907 51.8165 16.56 51.8165 14.256C51.8165 11.952 52.5098 10.032 53.8965 8.496C55.3045 6.93867 57.1605 6.16 59.4645 6.16C61.7685 6.16 63.6138 6.93867 65.0005 8.496C66.4085 10.032 67.1125 11.952 67.1125 14.256C67.1125 16.56 66.4085 18.4907 65.0005 20.048ZM55.6885 18.512C56.6272 19.664 57.8858 20.24 59.4645 20.24C61.0432 20.24 62.2912 19.664 63.2085 18.512C64.1258 17.3387 64.5845 15.92 64.5845 14.256C64.5845 12.592 64.1258 11.184 63.2085 10.032C62.2912 8.88 61.0432 8.304 59.4645 8.304C57.8858 8.304 56.6272 8.89067 55.6885 10.064C54.7712 11.216 54.3125 12.6133 54.3125 14.256C54.3125 15.92 54.7712 17.3387 55.6885 18.512Z" fill="#0043F1" />
                </svg>
            </div>
            <div class="side_bar_wrap">
                <a href="Dashboard" class="side_bar_item">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H8V8H0V0ZM0 10H8V18H0V10ZM10 0H18V8H10V0ZM10 10H18V18H10V10ZM12 2V6H16V2H12ZM12 12V16H16V12H12ZM2 2V6H6V2H2ZM2 12V16H6V12H2Z" fill="#003AD2" />
                    </svg>
                    <p>Dashboard</p>
                </a>
                <a href="Staff" class="side_bar_item">
                    <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.083 14.1999L19.285 14.9209C19.3591 14.9653 19.4205 15.0282 19.4631 15.1034C19.5058 15.1786 19.5282 15.2635 19.5282 15.3499C19.5282 15.4364 19.5058 15.5213 19.4631 15.5965C19.4205 15.6717 19.3591 15.7346 19.285 15.7789L10.515 21.0409C10.3594 21.1344 10.1814 21.1838 9.99998 21.1838C9.81853 21.1838 9.64051 21.1344 9.48498 21.0409L0.714977 15.7789C0.640823 15.7346 0.579442 15.6717 0.536823 15.5965C0.494204 15.5213 0.471802 15.4364 0.471802 15.3499C0.471802 15.2635 0.494204 15.1786 0.536823 15.1034C0.579442 15.0282 0.640823 14.9653 0.714977 14.9209L1.91698 14.1999L9.99998 19.0499L18.083 14.1999ZM18.083 9.49995L19.285 10.2209C19.3591 10.2653 19.4205 10.3282 19.4631 10.4034C19.5058 10.4786 19.5282 10.5635 19.5282 10.6499C19.5282 10.7364 19.5058 10.8213 19.4631 10.8965C19.4205 10.9717 19.3591 11.0346 19.285 11.0789L9.99998 16.6499L0.714977 11.0789C0.640823 11.0346 0.579442 10.9717 0.536823 10.8965C0.494204 10.8213 0.471802 10.7364 0.471802 10.6499C0.471802 10.5635 0.494204 10.4786 0.536823 10.4034C0.579442 10.3282 0.640823 10.2653 0.714977 10.2209L1.91698 9.49995L9.99998 14.3499L18.083 9.49995ZM10.514 0.308948L19.285 5.57095C19.3591 5.61534 19.4205 5.6782 19.4631 5.75338C19.5058 5.82857 19.5282 5.91352 19.5282 5.99995C19.5282 6.08637 19.5058 6.17132 19.4631 6.24651C19.4205 6.3217 19.3591 6.38455 19.285 6.42895L9.99998 11.9999L0.714977 6.42895C0.640823 6.38455 0.579442 6.3217 0.536823 6.24651C0.494204 6.17132 0.471802 6.08637 0.471802 5.99995C0.471802 5.91352 0.494204 5.82857 0.536823 5.75338C0.579442 5.6782 0.640823 5.61534 0.714977 5.57095L9.48498 0.308948C9.64051 0.215504 9.81853 0.166138 9.99998 0.166138C10.1814 0.166138 10.3594 0.215504 10.515 0.308948H10.514ZM9.99998 2.33195L3.88698 5.99995L9.99998 9.66795L16.113 5.99995L9.99998 2.33195Z" fill="#003AD2" />
                    </svg>
                    <p>Nhân viên</p>
                </a>
                <a href="Attendance" class="side_bar_item">
                    <svg width="18" height="19" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 20C4.477 20 0 15.523 0 10C0 5.522 2.943 1.732 7 0.458V2.582C5.28092 3.28005 3.8578 4.55371 2.97406 6.18512C2.09032 7.81652 1.80088 9.70431 2.15525 11.5255C2.50963 13.3468 3.48579 14.9883 4.91676 16.1693C6.34774 17.3503 8.14461 17.9975 10 18C11.5938 18 13.1513 17.524 14.4728 16.6332C15.7944 15.7424 16.82 14.4773 17.418 13H19.542C18.268 17.057 14.478 20 10 20ZM19.95 11H9V0.05C9.329 0.017 9.663 0 10 0C15.523 0 20 4.477 20 10C20 10.337 19.983 10.671 19.95 11ZM11 2.062V9H17.938C17.7154 7.23761 16.9129 5.59934 15.6568 4.34324C14.4007 3.08713 12.7624 2.28459 11 2.062Z" fill="#003AD2" />
                    </svg>
                    <p>Chấm công</p>
                </a>
                <a href="Department" class="side_bar_item">
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 18C18 18.2652 17.8946 18.5196 17.7071 18.7071C17.5196 18.8947 17.2652 19 17 19H1C0.734784 19 0.48043 18.8947 0.292893 18.7071C0.105357 18.5196 2.4071e-07 18.2652 2.4071e-07 18V7.49003C-0.000105484 7.33764 0.0346172 7.18724 0.101516 7.05033C0.168415 6.91341 0.26572 6.79359 0.386 6.70003L8.386 0.478028C8.56154 0.341473 8.7776 0.267334 9 0.267334C9.2224 0.267334 9.43846 0.341473 9.614 0.478028L17.614 6.70003C17.7343 6.79359 17.8316 6.91341 17.8985 7.05033C17.9654 7.18724 18.0001 7.33764 18 7.49003V18ZM16 17V7.97803L9 2.53403L2 7.97803V17H16ZM4 13H14V15H4V13Z" fill="#003AD2" />
                    </svg>
                    <p>Phòng ban</p>
                </a>
                <a href="Holiday" class="side_bar_item">
                    <svg width="18" height="19" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 20C4.477 20 0 15.523 0 10C0 5.522 2.943 1.732 7 0.458V2.582C5.28092 3.28005 3.8578 4.55371 2.97406 6.18512C2.09032 7.81652 1.80088 9.70431 2.15525 11.5255C2.50963 13.3468 3.48579 14.9883 4.91676 16.1693C6.34774 17.3503 8.14461 17.9975 10 18C11.5938 18 13.1513 17.524 14.4728 16.6332C15.7944 15.7424 16.82 14.4773 17.418 13H19.542C18.268 17.057 14.478 20 10 20ZM19.95 11H9V0.05C9.329 0.017 9.663 0 10 0C15.523 0 20 4.477 20 10C20 10.337 19.983 10.671 19.95 11ZM11 2.062V9H17.938C17.7154 7.23761 16.9129 5.59934 15.6568 4.34324C14.4007 3.08713 12.7624 2.28459 11 2.062Z" fill="#003AD2" />
                    </svg>
                    <p>Ngày Nghỉ</p>
                </a>
            </div>
            <div class="control_sidebar">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" class="transition-all" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M533.2 492.3L277.9 166.1c-3-3.9-7.7-6.1-12.6-6.1H188c-6.7 0-10.4 7.7-6.3 12.9L447.1 512 181.7 851.1A7.98 7.98 0 0 0 188 864h77.3c4.9 0 9.6-2.3 12.6-6.1l255.3-326.1c9.1-11.7 9.1-27.9 0-39.5zm304 0L581.9 166.1c-3-3.9-7.7-6.1-12.6-6.1H492c-6.7 0-10.4 7.7-6.3 12.9L751.1 512 485.7 851.1A7.98 7.98 0 0 0 492 864h77.3c4.9 0 9.6-2.3 12.6-6.1l255.3-326.1c9.1-11.7 9.1-27.9 0-39.5z"></path>
                </svg>
            </div>
        </aside>
        <div class="content">
            <header class="header">
                <div class="content_fix header_flex">
                    <ul class="wrap_nav">
                        <li class="nav_item">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M18 0L20 4V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V4.004L2 0H18ZM18 6H2V16H18V6ZM10 7L14 11H11V15H9V11H6L10 7ZM16.764 2H3.236L2.237 4H17.764L16.764 2Z" fill="#003AD2" />
                            </svg>
                            <a href="#">Sales Orders</a>
                        </li>
                        <li class="nav_item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.366 3.43799L18.577 8.99999H22V11H20.833L20.076 20.083C20.0552 20.3329 19.9413 20.5658 19.7568 20.7357C19.5723 20.9055 19.3308 20.9999 19.08 21H4.92C4.66925 20.9999 4.4277 20.9055 4.24322 20.7357C4.05875 20.5658 3.94481 20.3329 3.924 20.083L3.166 11H2V8.99999H5.422L8.634 3.43799L10.366 4.43799L7.732 8.99999H16.267L13.634 4.43799L15.366 3.43799V3.43799ZM18.826 11H5.173L5.84 19H18.159L18.826 11ZM13 13V17H11V13H13ZM9 13V17H7V13H9ZM17 13V17H15V13H17Z" fill="#003AD2" />
                            </svg>
                            <a href="#">Products</a>
                        </li>
                        <li class="nav_item">
                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 0H18L20 4V17C20 17.2652 19.8946 17.5196 19.7071 17.7071C19.5196 17.8946 19.2652 18 19 18H1C0.734784 18 0.48043 17.8946 0.292893 17.7071C0.105357 17.5196 0 17.2652 0 17V4.004L2 0ZM18 6H2V16H18V6ZM17.764 4L16.764 2H3.237L2.237 4H17.764ZM11 11H14L10 15L6 11H9V7H11V11Z" fill="#003AD2" />
                            </svg>

                            <a href="#">Purchase Orders</a>
                        </li>
                    </ul>
                    <div class="nav_search">
                        <input type="text" placeholder="Search">
                        <div class="search_icon">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.16669 0.666626C12.3067 0.666626 15.6667 4.02663 15.6667 8.16663C15.6667 12.3066 12.3067 15.6666 8.16669 15.6666C4.02669 15.6666 0.666687 12.3066 0.666687 8.16663C0.666687 4.02663 4.02669 0.666626 8.16669 0.666626ZM8.16669 14C11.3892 14 14 11.3891 14 8.16663C14 4.94329 11.3892 2.33329 8.16669 2.33329C4.94335 2.33329 2.33335 4.94329 2.33335 8.16663C2.33335 11.3891 4.94335 14 8.16669 14ZM15.2375 14.0591L17.595 16.4158L16.4159 17.595L14.0592 15.2375L15.2375 14.0591Z" fill="#1F4173" />
                            </svg>

                        </div>
                    </div>
                    <?php
                    require_once "./app/views/components/HeaderDropdown.php"
                    ?>
                </div>
            </header>
            <section class="wrap_content_ad content_fix">
                <?php
                require_once "./app/views/pages/" . $data['Page'] . ".php"
                ?>
            </section>
        </div>
    </main>

    <script>
        $(window).on('load', function() {
            $('.loading_main').hide();
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="public/js/main.js"></script>
</body>

</html>