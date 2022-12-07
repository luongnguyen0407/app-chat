<?php
$card = $data['Card'][0];
// echo $card['att'];

?>

<div class="content_dashboard ">
    <div class="content_dashboard_header">
        <p>Activity for today</p>
    </div>
</div>
<div class="content_dashboard_statistical">
    <div class="dashboard_card_list">
        <div class="dashboard_card_item">
            <div class="card_header">
                <p>Nhân Viên</p>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.5833 21.8333H3.41666C2.5547 21.8333 1.72805 21.4909 1.11856 20.8814C0.509066 20.2719 0.166656 19.4452 0.166656 18.5833V1.24996C0.166656 0.962641 0.280793 0.687091 0.483957 0.483927C0.687122 0.280763 0.962672 0.166626 1.24999 0.166626H16.4167C16.704 0.166626 16.9795 0.280763 17.1827 0.483927C17.3859 0.687091 17.5 0.962641 17.5 1.24996V14.25H21.8333V18.5833C21.8333 19.4452 21.4909 20.2719 20.8814 20.8814C20.2719 21.4909 19.4453 21.8333 18.5833 21.8333ZM17.5 16.4166V18.5833C17.5 18.8706 17.6141 19.1462 17.8173 19.3493C18.0205 19.5525 18.296 19.6666 18.5833 19.6666C18.8706 19.6666 19.1462 19.5525 19.3494 19.3493C19.5525 19.1462 19.6667 18.8706 19.6667 18.5833V16.4166H17.5ZM15.3333 19.6666V2.33329H2.33332V18.5833C2.33332 18.8706 2.44746 19.1462 2.65062 19.3493C2.85379 19.5525 3.12934 19.6666 3.41666 19.6666H15.3333ZM4.49999 5.58329H13.1667V7.74996H4.49999V5.58329ZM4.49999 9.91663H13.1667V12.0833H4.49999V9.91663ZM4.49999 14.25H9.91666V16.4166H4.49999V14.25Z" fill="white" />
                </svg>
            </div>
            <h4><?php PrintDisplay::printShow($card, 'total_nv') ?></h4>
            <div class="card_footer">
                <p>Chi tiết</p>
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.00001 5.99994H8.59001L5.29001 2.70994C5.10171 2.52164 4.99592 2.26624 4.99592 1.99994C4.99592 1.73364 5.10171 1.47825 5.29001 1.28994C5.47832 1.10164 5.73371 0.99585 6.00001 0.99585C6.26631 0.99585 6.52171 1.10164 6.71001 1.28994L11.71 6.28994C11.8011 6.38505 11.8724 6.49719 11.92 6.61994C12.02 6.8634 12.02 7.13648 11.92 7.37994C11.8724 7.50269 11.8011 7.61484 11.71 7.70994L6.71001 12.7099C6.61705 12.8037 6.50645 12.8781 6.38459 12.9288C6.26273 12.9796 6.13202 13.0057 6.00001 13.0057C5.868 13.0057 5.73729 12.9796 5.61544 12.9288C5.49358 12.8781 5.38298 12.8037 5.29001 12.7099C5.19628 12.617 5.12189 12.5064 5.07112 12.3845C5.02035 12.2627 4.99421 12.132 4.99421 11.9999C4.99421 11.8679 5.02035 11.7372 5.07112 11.6154C5.12189 11.4935 5.19628 11.3829 5.29001 11.2899L8.59001 7.99994H1.00001C0.734796 7.99994 0.480441 7.89458 0.292905 7.70705C0.105369 7.51951 1.23978e-05 7.26516 1.23978e-05 6.99994C1.23978e-05 6.73472 0.105369 6.48037 0.292905 6.29283C0.480441 6.1053 0.734796 5.99994 1.00001 5.99994Z" fill="white" />
                </svg>
            </div>
        </div>
        <div class="dashboard_card_item">
            <div class="card_header">
                <p>Đi làm hôm nay</p>
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 2V16.721C20.0001 16.818 19.972 16.913 19.9191 16.9943C19.8662 17.0756 19.7908 17.1398 19.702 17.179L11 21.03L2.298 17.18C2.20894 17.1407 2.13329 17.0762 2.08035 16.9945C2.02742 16.9128 1.99949 16.8174 2 16.72V2H0V0H22V2H20ZM4 2V15.745L11 18.845L18 15.745V2H4ZM7 6H15V8H7V6ZM7 10H15V12H7V10Z" fill="white" />
                </svg>
            </div>
            <h4><?= PrintDisplay::printShow($card, 'att') ?></h4>
            <div class="card_footer">
                <p>Chi tiết</p>
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.00001 5.99994H8.59001L5.29001 2.70994C5.10171 2.52164 4.99592 2.26624 4.99592 1.99994C4.99592 1.73364 5.10171 1.47825 5.29001 1.28994C5.47832 1.10164 5.73371 0.99585 6.00001 0.99585C6.26631 0.99585 6.52171 1.10164 6.71001 1.28994L11.71 6.28994C11.8011 6.38505 11.8724 6.49719 11.92 6.61994C12.02 6.8634 12.02 7.13648 11.92 7.37994C11.8724 7.50269 11.8011 7.61484 11.71 7.70994L6.71001 12.7099C6.61705 12.8037 6.50645 12.8781 6.38459 12.9288C6.26273 12.9796 6.13202 13.0057 6.00001 13.0057C5.868 13.0057 5.73729 12.9796 5.61544 12.9288C5.49358 12.8781 5.38298 12.8037 5.29001 12.7099C5.19628 12.617 5.12189 12.5064 5.07112 12.3845C5.02035 12.2627 4.99421 12.132 4.99421 11.9999C4.99421 11.8679 5.02035 11.7372 5.07112 11.6154C5.12189 11.4935 5.19628 11.3829 5.29001 11.2899L8.59001 7.99994H1.00001C0.734796 7.99994 0.480441 7.89458 0.292905 7.70705C0.105369 7.51951 1.23978e-05 7.26516 1.23978e-05 6.99994C1.23978e-05 6.73472 0.105369 6.48037 0.292905 6.29283C0.480441 6.1053 0.734796 5.99994 1.00001 5.99994Z" fill="white" />
                </svg>
            </div>
        </div>
        <div class="dashboard_card_item">
            <div class="card_header">
                <p>Vắng mặt</p>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM10 18C12.1217 18 14.1566 17.1571 15.6569 15.6569C17.1571 14.1566 18 12.1217 18 10C18 7.87827 17.1571 5.84344 15.6569 4.34315C14.1566 2.84285 12.1217 2 10 2C7.87827 2 5.84344 2.84285 4.34315 4.34315C2.84285 5.84344 2 7.87827 2 10C2 12.1217 2.84285 14.1566 4.34315 15.6569C5.84344 17.1571 7.87827 18 10 18ZM9.003 14L4.76 9.757L6.174 8.343L9.003 11.172L14.659 5.515L16.074 6.929L9.003 14Z" fill="white" />
                </svg>
            </div>
            <h4><?= $card['total_nv'] - $card['att'] ?></h4>
            <div class="card_footer">
                <p>Chi tiết</p>
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.00001 5.99994H8.59001L5.29001 2.70994C5.10171 2.52164 4.99592 2.26624 4.99592 1.99994C4.99592 1.73364 5.10171 1.47825 5.29001 1.28994C5.47832 1.10164 5.73371 0.99585 6.00001 0.99585C6.26631 0.99585 6.52171 1.10164 6.71001 1.28994L11.71 6.28994C11.8011 6.38505 11.8724 6.49719 11.92 6.61994C12.02 6.8634 12.02 7.13648 11.92 7.37994C11.8724 7.50269 11.8011 7.61484 11.71 7.70994L6.71001 12.7099C6.61705 12.8037 6.50645 12.8781 6.38459 12.9288C6.26273 12.9796 6.13202 13.0057 6.00001 13.0057C5.868 13.0057 5.73729 12.9796 5.61544 12.9288C5.49358 12.8781 5.38298 12.8037 5.29001 12.7099C5.19628 12.617 5.12189 12.5064 5.07112 12.3845C5.02035 12.2627 4.99421 12.132 4.99421 11.9999C4.99421 11.8679 5.02035 11.7372 5.07112 11.6154C5.12189 11.4935 5.19628 11.3829 5.29001 11.2899L8.59001 7.99994H1.00001C0.734796 7.99994 0.480441 7.89458 0.292905 7.70705C0.105369 7.51951 1.23978e-05 7.26516 1.23978e-05 6.99994C1.23978e-05 6.73472 0.105369 6.48037 0.292905 6.29283C0.480441 6.1053 0.734796 5.99994 1.00001 5.99994Z" fill="white" />
                </svg>
            </div>
        </div>
        <div class="dashboard_card_item">
            <div class="card_header">
                <p>Phòng Ban</p>
                <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 13.252V15.342C9.09492 15.022 8.12628 14.9239 7.1754 15.0558C6.22453 15.1877 5.3192 15.5459 4.53543 16.1002C3.75166 16.6545 3.11234 17.3888 2.67116 18.2414C2.22998 19.094 1.99982 20.04 2 21L2.58457e-07 20.999C-0.000310114 19.7779 0.278921 18.5729 0.816299 17.4764C1.35368 16.3799 2.13494 15.4209 3.10022 14.673C4.0655 13.9251 5.18918 13.4081 6.38515 13.1616C7.58113 12.9152 8.81766 12.9457 10 13.251V13.252ZM8 12C4.685 12 2 9.315 2 6C2 2.685 4.685 0 8 0C11.315 0 14 2.685 14 6C14 9.315 11.315 12 8 12ZM8 10C10.21 10 12 8.21 12 6C12 3.79 10.21 2 8 2C5.79 2 4 3.79 4 6C4 8.21 5.79 10 8 10ZM16 16H19V18H16V21.5L11 17L16 12.5V16Z" fill="white" />
                </svg>
            </div>
            <h4><?php PrintDisplay::printShow($card, 'pb') ?></h4>
            <div class="card_footer">
                <p>Chi tiết</p>
                <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.00001 5.99994H8.59001L5.29001 2.70994C5.10171 2.52164 4.99592 2.26624 4.99592 1.99994C4.99592 1.73364 5.10171 1.47825 5.29001 1.28994C5.47832 1.10164 5.73371 0.99585 6.00001 0.99585C6.26631 0.99585 6.52171 1.10164 6.71001 1.28994L11.71 6.28994C11.8011 6.38505 11.8724 6.49719 11.92 6.61994C12.02 6.8634 12.02 7.13648 11.92 7.37994C11.8724 7.50269 11.8011 7.61484 11.71 7.70994L6.71001 12.7099C6.61705 12.8037 6.50645 12.8781 6.38459 12.9288C6.26273 12.9796 6.13202 13.0057 6.00001 13.0057C5.868 13.0057 5.73729 12.9796 5.61544 12.9288C5.49358 12.8781 5.38298 12.8037 5.29001 12.7099C5.19628 12.617 5.12189 12.5064 5.07112 12.3845C5.02035 12.2627 4.99421 12.132 4.99421 11.9999C4.99421 11.8679 5.02035 11.7372 5.07112 11.6154C5.12189 11.4935 5.19628 11.3829 5.29001 11.2899L8.59001 7.99994H1.00001C0.734796 7.99994 0.480441 7.89458 0.292905 7.70705C0.105369 7.51951 1.23978e-05 7.26516 1.23978e-05 6.99994C1.23978e-05 6.73472 0.105369 6.48037 0.292905 6.29283C0.480441 6.1053 0.734796 5.99994 1.00001 5.99994Z" fill="white" />
                </svg>
            </div>
        </div>
    </div>
    <div class="dashboard_card_list">
        <div class="dashboard_card_item_2">
            <div class="card_header_2">
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#FA582E" fill-opacity="0.15" />
                    <g clip-path="url(#clip0_1_1256)">
                        <path d="M28.7917 29.875H14.2084C13.9321 29.875 13.6671 29.7653 13.4718 29.5699C13.2764 29.3745 13.1667 29.1096 13.1667 28.8333V19.4583H10.0417L20.799 9.67916C20.9908 9.50466 21.2407 9.40796 21.5 9.40796C21.7593 9.40796 22.0093 9.50466 22.2011 9.67916L32.9584 19.4583H29.8334V28.8333C29.8334 29.1096 29.7236 29.3745 29.5283 29.5699C29.3329 29.7653 29.068 29.875 28.7917 29.875ZM15.25 27.7917H27.75V17.5385L21.5 11.8573L15.25 17.5385V27.7917Z" fill="#FA582E" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1256">
                            <rect width="25" height="25" fill="white" transform="translate(9 8)" />
                        </clipPath>
                    </defs>
                </svg>
                <p>To be Fulfilled</p>
            </div>
            <div class="card_footer_2">
                <p>89.00</p>
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#E6EAF0" />
                    <g clip-path="url(#clip0_1_1259)">
                        <path d="M21.6792 20.5L18.7323 17.5542L20.2052 16.0802L24.625 20.5L20.2052 24.9198L18.7323 23.4458L21.6792 20.5Z" fill="#1F4173" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1259">
                            <rect width="25" height="25" fill="white" transform="translate(9 8)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="dashboard_card_item_2">
            <div class="card_header_2">
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#0163DE" fill-opacity="0.15" />
                    <path d="M22 7.5C23.9891 7.5 25.8968 8.29018 27.3033 9.6967C28.7098 11.1032 29.5 13.0109 29.5 15V16.25H34.5V18.75H33.0413L32.095 30.1038C32.069 30.4161 31.9266 30.7073 31.696 30.9196C31.4654 31.1319 31.1634 31.2498 30.85 31.25H13.15C12.8366 31.2498 12.5346 31.1319 12.304 30.9196C12.0734 30.7073 11.931 30.4161 11.905 30.1038L10.9575 18.75H9.5V16.25H14.5V15C14.5 13.0109 15.2902 11.1032 16.6967 9.6967C18.1032 8.29018 20.0109 7.5 22 7.5V7.5ZM30.5325 18.75H13.4662L14.3 28.75H29.6988L30.5325 18.75ZM23.25 21.25V26.25H20.75V21.25H23.25ZM18.25 21.25V26.25H15.75V21.25H18.25ZM28.25 21.25V26.25H25.75V21.25H28.25ZM22 10C20.7172 10 19.4835 10.493 18.554 11.3772C17.6245 12.2613 17.0704 13.4688 17.0063 14.75L17 15V16.25H27V15C27 13.7172 26.507 12.4835 25.6228 11.554C24.7387 10.6245 23.5312 10.0704 22.25 10.0063L22 10Z" fill="#0163DE" />
                </svg>
                <p>All</p>
            </div>
            <div class="card_footer_2">
                <p>267.00</p>
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#E6EAF0" />
                    <g clip-path="url(#clip0_1_1259)">
                        <path d="M21.6792 20.5L18.7323 17.5542L20.2052 16.0802L24.625 20.5L20.2052 24.9198L18.7323 23.4458L21.6792 20.5Z" fill="#1F4173" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1259">
                            <rect width="25" height="25" fill="white" transform="translate(9 8)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="dashboard_card_item_2">
            <div class="card_header_2">
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#0FBB59" fill-opacity="0.15" />
                    <g clip-path="url(#clip0_1_1285)">
                        <path d="M9.875 8.86471C9.875 8.15687 10.4498 7.58337 11.1576 7.58337H31.8424C32.1816 7.58574 32.5063 7.72145 32.7463 7.9612C32.9862 8.20095 33.1223 8.52549 33.125 8.86471V32.1354C33.1247 32.4753 32.9894 32.8012 32.7489 33.0415C32.5084 33.2818 32.1823 33.4167 31.8424 33.4167H11.1576C10.8184 33.4143 10.4937 33.2786 10.2537 33.0389C10.0137 32.7991 9.87771 32.4746 9.875 32.1354V8.86471ZM30.5417 19.2084V10.1667H12.4583V19.2084H30.5417ZM30.5417 21.7917H12.4583V30.8334H30.5417V21.7917ZM17.625 12.75H25.375V15.3334H17.625V12.75ZM17.625 24.375H25.375V26.9584H17.625V24.375Z" fill="#0FBB59" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1285">
                            <rect width="31" height="31" fill="white" transform="translate(6 5)" />
                        </clipPath>
                    </defs>
                </svg>
                <p>Archived</p>
            </div>
            <div class="card_footer_2">
                <p>2.00</p>
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#E6EAF0" />
                    <g clip-path="url(#clip0_1_1259)">
                        <path d="M21.6792 20.5L18.7323 17.5542L20.2052 16.0802L24.625 20.5L20.2052 24.9198L18.7323 23.4458L21.6792 20.5Z" fill="#1F4173" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1259">
                            <rect width="25" height="25" fill="white" transform="translate(9 8)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
        <div class="dashboard_card_item_2">
            <div class="card_header_2">
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#7828DC" fill-opacity="0.15" />
                    <g clip-path="url(#clip0_1_1293)">
                        <path d="M13.0416 16.875C13.3621 16.875 13.6695 17.0023 13.8961 17.2289C14.1227 17.4555 14.25 17.7628 14.25 18.0833C16.1484 18.0805 17.9922 18.7192 19.4821 19.8958H22.1041C23.7136 19.8958 25.1612 20.5954 26.1557 21.7071L29.9583 21.7083C31.1005 21.708 32.2194 22.0314 33.1852 22.6412C34.151 23.2509 34.9242 24.1219 35.4151 25.1532C32.5574 28.9245 27.9307 31.375 22.7083 31.375C19.3371 31.375 16.4854 30.6463 14.1775 29.3715C14.0929 29.6048 13.9385 29.8063 13.7352 29.9486C13.532 30.0909 13.2898 30.167 13.0416 30.1666H9.41665C9.09618 30.1666 8.78883 30.0393 8.56223 29.8127C8.33562 29.5861 8.20831 29.2788 8.20831 28.9583V18.0833C8.20831 17.7628 8.33562 17.4555 8.56223 17.2289C8.78883 17.0023 9.09618 16.875 9.41665 16.875H13.0416ZM14.2512 20.5L14.25 26.567L14.3044 26.6069C16.4733 28.1294 19.2984 28.9583 22.7083 28.9583C26.3381 28.9583 29.7154 27.5615 32.1756 25.1762L32.3363 25.0155L32.1913 24.8947C31.6207 24.4478 30.9291 24.1826 30.206 24.1334L29.9583 24.125L27.4063 24.1237C27.4945 24.5128 27.5416 24.9176 27.5416 25.3333V26.5416H16.6666V24.125L24.8712 24.1237L24.8301 24.0295C24.5986 23.5456 24.2424 23.1321 23.7981 22.8314C23.3539 22.5307 22.8376 22.3537 22.3023 22.3185L22.1041 22.3125H18.5637C18.0022 21.7382 17.3316 21.282 16.5912 20.9707C15.8507 20.6594 15.0556 20.4994 14.2524 20.5H14.2512ZM11.8333 19.2916H10.625V27.75H11.8333V19.2916ZM23.4889 10.3197L23.9166 10.7487L24.3444 10.321C24.6245 10.0385 24.9576 9.81409 25.3247 9.6607C25.6917 9.50731 26.0855 9.42793 26.4833 9.42711C26.8811 9.4263 27.2752 9.50407 27.6428 9.65596C28.0105 9.80784 28.3446 10.0309 28.6258 10.3122C28.9071 10.5935 29.13 10.9276 29.2818 11.2954C29.4336 11.6631 29.5112 12.0572 29.5103 12.455C29.5094 12.8528 29.4299 13.2465 29.2764 13.6135C29.1229 13.9805 28.8984 14.3136 28.6159 14.5936L23.9166 19.2916L19.2162 14.5912C18.9337 14.3111 18.7094 13.978 18.556 13.6109C18.4026 13.2439 18.3232 12.8501 18.3224 12.4523C18.3216 12.0545 18.3993 11.6604 18.5512 11.2928C18.7031 10.9251 18.9261 10.591 19.2075 10.3098C19.4888 10.0285 19.8229 9.8056 20.1906 9.65381C20.5584 9.50203 20.9524 9.42437 21.3503 9.4253C21.7481 9.42623 22.1418 9.50572 22.5088 9.65922C22.8758 9.81271 23.2089 10.0372 23.4889 10.3197ZM20.9272 12.0295C20.8271 12.1291 20.765 12.2607 20.7517 12.4013C20.7385 12.5419 20.7749 12.6827 20.8547 12.7992L20.9248 12.8826L23.9166 15.872L26.9085 12.8826C27.0086 12.7827 27.0704 12.6507 27.0832 12.5099C27.096 12.369 27.059 12.2281 26.9786 12.1117L26.9085 12.0271C26.8084 11.9272 26.6764 11.8656 26.5355 11.853C26.3946 11.8404 26.2538 11.8777 26.1376 11.9582L26.053 12.0283L23.9154 14.1647L21.7803 12.0259L21.6981 11.9582C21.5818 11.8778 21.4409 11.8408 21.3 11.8536C21.1591 11.8664 21.0272 11.9282 20.9272 12.0283V12.0295Z" fill="#7828DC" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1293">
                            <rect width="29" height="29" fill="white" transform="translate(7 6)" />
                        </clipPath>
                    </defs>
                </svg>
                <p>Quantity On Hand</p>
            </div>
            <div class="card_footer_2">
                <p>684.00</p>
                <svg width="43" height="41" viewBox="0 0 43 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="43" height="41" rx="5" fill="#E6EAF0" />
                    <g clip-path="url(#clip0_1_1259)">
                        <path d="M21.6792 20.5L18.7323 17.5542L20.2052 16.0802L24.625 20.5L20.2052 24.9198L18.7323 23.4458L21.6792 20.5Z" fill="#1F4173" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_1259">
                            <rect width="25" height="25" fill="white" transform="translate(9 8)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>
    </div>
    <section class="dashboard_list_table">
        <div class="dashboard_table_item_1">
            <p class="dashboard_table_item_1_header">Danh sách nhân viên mớ<i></i></p>
            <div class="dashboard_table_search">
                <div class="dashboard_table_input">
                    <input type="text" placeholder="Search">
                    <div class="table_icon_search">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.25 1.5C11.976 1.5 15 4.524 15 8.25C15 11.976 11.976 15 8.25 15C4.524 15 1.5 11.976 1.5 8.25C1.5 4.524 4.524 1.5 8.25 1.5ZM8.25 13.5C11.1503 13.5 13.5 11.1503 13.5 8.25C13.5 5.349 11.1503 3 8.25 3C5.349 3 3 5.349 3 8.25C3 11.1503 5.349 13.5 8.25 13.5ZM14.6138 13.5533L16.7355 15.6743L15.6743 16.7355L13.5533 14.6138L14.6138 13.5533Z" fill="#1F4173" />
                        </svg>
                    </div>
                </div>
                <div class="dashboard_table_search_tab">
                    <div>All</div>
                    <div>Open</div>
                    <div>Completed</div>
                    <div>Fulfilled</div>
                </div>
            </div>
            <ul class="dashboard_table_list hide_scroll">
                <li class="dashboard_table_list_item dashboard_table_list_item_head">
                    <p>Order ID</p>
                    <p>Customer</p>
                    <p>Fulfillment status</p>
                    <p>Total</p>
                </li>
                <li class="dashboard_table_list_item dashboard_table_list_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status success">Fulfillment</p>
                    <p class="table_item_total">200.000</p>
                </li>
                <li class="dashboard_table_list_item dashboard_table_list_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status success">Fulfillment</p>
                    <p class="table_item_total">200.000</p>
                </li>
            </ul>
        </div>
        <div class="dashboard_table_item_1 dashboard_table_item_2">
            <p class="dashboard_table_item_1_header">Top lương tháng trước</p>
            <div class="wrap_top_salary">
                <div class="wrap_top_salary_item">
                    <img class="top_salary_avatar" src="https://images.unsplash.com/photo-1620523162656-4f968dca355a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="avatar">
                    <p class="top_salary_name">Nguyen van a</p>
                    <p class="top_salary_money">12.000.000</p>
                </div>
                <div class="wrap_top_salary_item">
                    <img class="top_salary_avatar" src="https://images.unsplash.com/photo-1620523162656-4f968dca355a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="avatar">
                    <p class="top_salary_name">Nguyen van a</p>
                    <p class="top_salary_money">12.000.000</p>
                </div>
                <div class="wrap_top_salary_item">
                    <img class="top_salary_avatar" src="https://images.unsplash.com/photo-1620523162656-4f968dca355a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="avatar">
                    <p class="top_salary_name">Nguyen van a</p>
                    <p class="top_salary_money">12.000.000</p>
                </div>
                <div class="wrap_top_salary_item">
                    <img class="top_salary_avatar" src="https://images.unsplash.com/photo-1620523162656-4f968dca355a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="avatar">
                    <p class="top_salary_name">Nguyen van a</p>
                    <p class="top_salary_money">12.000.000</p>
                </div>
                <div class="wrap_top_salary_item">
                    <img class="top_salary_avatar" src="https://images.unsplash.com/photo-1620523162656-4f968dca355a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="avatar">
                    <p class="top_salary_name">Nguyen van a</p>
                    <p class="top_salary_money">12.000.000</p>
                </div>
                <div class="wrap_top_salary_item">
                    <img class="top_salary_avatar" src="https://images.unsplash.com/photo-1620523162656-4f968dca355a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="avatar">
                    <p class="top_salary_name">Nguyen van a</p>
                    <p class="top_salary_money">12.000.000</p>
                </div>
            </div>
        </div>
    </section>
    <section class="chart-container">
        <canvas id="canvas"></canvas>
    </section>
    <section class="dashboard_manage_uni">
        <div class="dashboard_manage_item">
            <div class="dashboard_manage_head">
                <p>Items At Low Quantity</p>
                <div class="dashboard_manage_search">
                    <div class="dashboard_table_input">
                        <input type="text" placeholder="Search">
                        <div class="table_icon_search">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 1.5C11.976 1.5 15 4.524 15 8.25C15 11.976 11.976 15 8.25 15C4.524 15 1.5 11.976 1.5 8.25C1.5 4.524 4.524 1.5 8.25 1.5ZM8.25 13.5C11.1503 13.5 13.5 11.1503 13.5 8.25C13.5 5.349 11.1503 3 8.25 3C5.349 3 3 5.349 3 8.25C3 11.1503 5.349 13.5 8.25 13.5ZM14.6138 13.5533L16.7355 15.6743L15.6743 16.7355L13.5533 14.6138L14.6138 13.5533Z" fill="#1F4173" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="dashboard_manage_list hide_scroll">
                <li class="dashboard_manage_item_title">
                    <p>SKU</p>
                    <p>Inventory</p>
                    <p> Incoming PO</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customers</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
            </ul>
        </div>
        <div class="dashboard_manage_item dashboard_manage_item_2">
            <div class="dashboard_manage_head">
                <p>Items At Low Quantity</p>
                <div class="dashboard_manage_search">
                    <div class="dashboard_table_input">
                        <input type="text" placeholder="Search">
                        <div class="table_icon_search">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 1.5C11.976 1.5 15 4.524 15 8.25C15 11.976 11.976 15 8.25 15C4.524 15 1.5 11.976 1.5 8.25C1.5 4.524 4.524 1.5 8.25 1.5ZM8.25 13.5C11.1503 13.5 13.5 11.1503 13.5 8.25C13.5 5.349 11.1503 3 8.25 3C5.349 3 3 5.349 3 8.25C3 11.1503 5.349 13.5 8.25 13.5ZM14.6138 13.5533L16.7355 15.6743L15.6743 16.7355L13.5533 14.6138L14.6138 13.5533Z" fill="#1F4173" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="dashboard_manage_list hide_scroll">
                <li class="dashboard_manage_item_title">
                    <p>SKU</p>
                    <p>Inventory</p>
                    <p> Incoming PO</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customers</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customer</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
            </ul>
        </div>
    </section>
    <section class="dashboard_manage_end">
        <div class="dashboard_manage_end_table">
            <div class="dashboard_manage_end_head">
                <p>Items At Low Quantity</p>
                <div class="dashboard_manage_search">
                    <div class="dashboard_table_input">
                        <input type="text" placeholder="Search">
                        <div class="table_icon_search">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.25 1.5C11.976 1.5 15 4.524 15 8.25C15 11.976 11.976 15 8.25 15C4.524 15 1.5 11.976 1.5 8.25C1.5 4.524 4.524 1.5 8.25 1.5ZM8.25 13.5C11.1503 13.5 13.5 11.1503 13.5 8.25C13.5 5.349 11.1503 3 8.25 3C5.349 3 3 5.349 3 8.25C3 11.1503 5.349 13.5 8.25 13.5ZM14.6138 13.5533L16.7355 15.6743L15.6743 16.7355L13.5533 14.6138L14.6138 13.5533Z" fill="#1F4173" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="dashboard_manage_list hide_scroll">
                <li class="dashboard_manage_item_title">
                    <p>SKU</p>
                    <p>Status</p>
                    <p> SKU Quantity</p>
                    <p>Item Quantity</p>
                    <p>Order Value</p>
                </li>
                <li class="dashboard_manage_item_content">
                    <p class="table_item_id">Order ID</p>
                    <p class="table_item_customer">Customers</p>
                    <p class="table_item_status">Fulfillment</p>
                    <p class="table_item_status">Fulfillment</p>
                    <p class="table_item_status">Fulfillment</p>
                </li>
            </ul>
        </div>
    </section>
</div>
<script defer src="./public/js/chart.js"></script>