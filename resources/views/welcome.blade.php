<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NextGen Tech club | landing Page</title>
    <base href="{{ asset('landing_assets') }}/" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Main Logo -->
    <div class="logo"><a href="#">NextGen</a></div>

    <!-- Menu Toggle Button -->
    <div class="menu-toggle closed">
        <div class="menu-toggle-icon">
            <div class="hamburger">
                <div class="menu-bar" data-position="top"></div>
                <div class="menu-bar" data-position="bottom"></div>
            </div>
        </div>
        <div class="menu-copy">
            <p>Menu</p>
        </div>
    </div>


    <!-- Full Screen Menu -->
    <div class="menu">
        <div class="col col-1">
            <div class="menu-logo"><a href="#">NextGen</a></div>
            <div class="links">
                <div class="link"><a href="#Hero">Home</a></div>
                <div class="link"><a href="#about">About Us</a></div>
                <div class="link"><a href="#advantages">Advantages & Values</a></div>
                <div class="link"><a href="#events">Events</a></div>
                <div class="link"><a href="{{ route('boardmember.login') }}">Board Member</a></div>
                <div class="link"><a href="{{ route('member.login') }}">Member</a></div>
                <div class="link"><a href="#team">Our Team</a></div>
                <div class="link"><a href="#contact">Contact Us</a></div>
            </div>
            {{-- <div class="video-wrapper">
                <video autoplay muted loop playsinline>
                    <source src="09.06.2024_17.02.48_REC.mp4" type="video/mp4">
                </video>
            </div> --}}
        </div>

        <div class="col col-2">
            <div class="socials">
                <div class="sub-col">
                    <p>NextGen Tech</p>
                    <p>ElSewedy Universty Of Technology</p>
                    {{-- <p>69001 obour</p> --}}
                    <p>Egypt</p>
                    <br />
                    {{-- <p>Nexten@sut.edu.eg</p> --}}
                    {{-- <p>job@kamel.no</p> --}}
                </div>
                <div class="sub-col">
                    {{-- <p>Instagram</p>
                    <p>LinkedIn</p>
                    <p>TikTok</p>
                    <p>Facebook</p>
                    <br />
                    <p>01 23 45 67 89</p> --}}
                    <label class="theme-switch">
                        <span class="sun"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g fill="#ffd43b">
                                    <circle r="5" cy="12" cx="12"></circle>
                                    <path
                                        d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z">
                                    </path>
                                </g>
                            </svg></span>
                        <span class="moon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z">
                                </path>
                            </svg></span>
                        <input type="checkbox" class="input">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div class="header">
                <h1>NextGen</h1>
            </div>
        </div>
    </div>

    <!--========== Hero Section ==========-->

    <div id="Hero" class="Hero-container">
        <section class="hero-section-main">
            <div class="hero-overlay"></div>
            <div class="hero-header">
                <h1>NextGen</h1>
            </div>
            <div class="hero-img">
                <img src="photo_2024-11-09_19-02-54.jpg" alt="Hero image" loading="lazy">
            </div>
        </section>
    </div>


    <div id="main-content"></div>
    <!--========== About Us Section ==========-->
    <section id="about" class="section about reveal">

        <div class="responsive-container-block bigContainer">
            <div class="responsive-container-block Container">
                <div class="responsive-container-block leftSide">
                    <p class="text-blk heading">
                        About Us
                    </p>
                    <p class="text-blk subHeading">
                        NextGen Tech Club empowers individuals in Network & Cybersecurity, Computer Science, and Data Science with cutting-edge skills through hands-on learning, mentorship, and collaboration. We aim to inspire innovation, address real-world challenges, and develop ethical leaders ready to shape the future of technology.
                    </p>
                </div>
                <div class="responsive-container-block rightSide">
                    <img class="number1img" src="Aurra.JPG" alt="Team member 1">
                    <img class="number2img" src="DSC00613.JPG" alt="Team member 2">
                    <img class="number3img" src="DSC00759.JPG" alt="Team member 3">
                    <img class="number5img" src="DSC00766.JPG" alt="Customer support">
                    {{-- <iframe allowfullscreen="allowfullscreen" class="number4vid" src="logo.png"></iframe> --}}


                    <img class="number7img" src="DSC00822.JPG" alt="Team member 4">
                    <img class="number6img" src="DSC01414.JPG" alt="Team member 5">
                </div>
            </div>

    </section>

    <!--========== Advantages & Values Section ==========-->
    <section id="advantages" class="section advantages reveal">
        <section class="advantages-section">
            <div class="section-header">
                <h1 class="section-title">Our Advantages & Values</h1>
                <p class="section-subtitle">Discover what sets us apart and the principles that guide our work</p>
            </div>

            <div class="advantages-container">
                <details class="advantage-item" open>
                    <summary>
                        <h2 class="advantage-title">Innovation & Technology Leadership</h2>
                        <span class="icon-container">
                            <svg class="icon icon-plus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg class="icon icon-minus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </summary>
                    <div class="advantage-content">
                        We stay at the forefront of technological advancement, consistently implementing cutting-edge solutions that drive efficiency and innovation in every project we undertake.
                    </div>
                </details>

                <details class="advantage-item">
                    <summary>
                        <h2 class="advantage-title">Quality & Excellence</h2>
                        <span class="icon-container">
                            <svg class="icon icon-plus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg class="icon icon-minus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </summary>
                    <div class="advantage-content">
                        Our commitment to excellence is unwavering. We maintain the highest standards in every aspect of our work, ensuring superior results that exceed expectations.
                    </div>
                </details>

                <details class="advantage-item">
                    <summary>
                        <h2 class="advantage-title">Customer-Centric Approach</h2>
                        <span class="icon-container">
                            <svg class="icon icon-plus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg class="icon icon-minus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </summary>
                    <div class="advantage-content">
                        Your success is our priority. We work closely with our clients to understand their unique needs and deliver tailored solutions that drive real business value.
                    </div>
                </details>

                <details class="advantage-item">
                    <summary>
                        <h2 class="advantage-title">Sustainable Practices</h2>
                        <span class="icon-container">
                            <svg class="icon icon-plus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <svg class="icon icon-minus" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                    </summary>
                    <div class="advantage-content">
                        We're committed to environmental responsibility, implementing sustainable practices throughout our operations to ensure a better future for generations to come.
                    </div>
                </details>
            </div>
        </section>
    </section>

    <!--========== Events Section ==========-->
    <section id="events" class="section events reveal">
        <section class="events-gallery">
            <h2 class="gallery-title">Upcoming Events</h2>
            <div class="events-grid">
                <!-- Event 1 -->
                <article class="event-card">
                    <img alt="Event Cover" src="Aurra.JPG" class="event-image" />
                    <div class="event-content">
                        <time datetime="2024-11-10" class="event-date">10th Nov 2024</time>
                        <a class="event-title-link">
                            <h3 class="event-title">Interior Design Workshop</h3>
                        </a>
                        <p class="event-description">
                            Join us for an exclusive workshop on modern interior design principles and techniques.
                        </p>
                    </div>
                </article>

                <!-- Event 2 -->
                <article class="event-card">
                    <img alt="Event Cover" src="DSC00743.JPG" class="event-image" />
                    <div class="event-content">
                        <time datetime="2024-11-15" class="event-date">15th Nov 2024</time>
                        <a class="event-title-link">
                            <h3 class="event-title">Sustainable Living Exhibition</h3>
                        </a>
                        <p class="event-description">
                            Explore sustainable living solutions and eco-friendly home designs.
                        </p>
                    </div>
                </article>

                <!-- Event 3 -->
                <article class="event-card">
                    <img alt="Event Cover" src="DSC00769.JPG" class="event-image" />
                    <div class="event-content">
                        <time datetime="2024-11-20" class="event-date">20th Nov 2024</time>
                        <a  class="event-title-link">
                            <h3 class="event-title">Art & Architecture Symposium</h3>
                        </a>
                        <p class="event-description">
                            A confluence of art and architecture featuring renowned speakers.
                        </p>
                    </div>
                </article>

                <!-- Event 4 -->
                <article class="event-card">
                    <img alt="Event Cover" src="DSC00829.JPG" class="event-image" />
                    <div class="event-content">
                        <time datetime="2024-11-25" class="event-date">25th Nov 2024</time>
                        <a  class="event-title-link">
                            <h3 class="event-title">Home Automation Workshop</h3>
                        </a>
                        <p class="event-description">
                            Learn about the latest trends in smart home technology and automation.
                        </p>
                    </div>
                </article>

                </div>
        </section>

    </section>

    <!--========== Our Team Section ==========-->
    <section id="team" class="section team reveal">

        <h2 class="gallery-title">Our High Board</h2>
        <section class="team-section">
            <div class="team-grid">
                <a href="#" class="team-card">
                    <img src="ali.png" alt="Team Member 1">
                    <div class="card-content">
                        <p class="role">Event Managemnent</p>
                        <p class="name">Ali Moahemd</p>
                        <p class="bio">Head Of Event Management.</p>
                    </div>
                </a>
                <a href="#" class="team-card">
                    <img src="pixelcut-export.png" alt="Team Member 2">
                    <div class="card-content">
                        <p class="role">Marketing</p>
                        <p class="name">Menna Elzahaby</p>
                        <p class="bio">Head Of Marketing</p>
                    </div>
                </a>
                <a href="#" class="team-card">
                    <img src="IMG_20230716_043700_759.jpg" alt="Team Member 3">
                    <div class="card-content">
                        <p class="role">Research & Development</p>
                        <p class="name">Omar Abduh</p>
                        <p class="bio">Head Of Research & Development .</p>
                    </div>
                </a>
            </div>

            {{-- <div class="pagination">
                <div class="pagination-item pagination-arrow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                    <span class="arrow-text">Previous</span>
                </div>
                <div class="pagination-item active">1</div>
                <div class="pagination-item">2</div>
                <div class="pagination-item">3</div>
                <div class="pagination-item">4</div>
                <div class="pagination-item">540</div>
                <div class="pagination-item pagination-arrow">
                    <span class="arrow-text">Next</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div> --}}
        </section>
    </section>

    <!--========== Join Us Section ==========-->
    {{-- <section id="contact" class="section contact reveal">
        <section class="join-us">
            <div class="grid-container">
                <aside class="image-section">
                    <img alt="Decorative background"
                        src="photo_2024-11-09_19-02-47.jpg"
                        class="image-cover" />
                </aside>
                <main class="form-container">
                    <div class="content-wrapper">

                        <h1 class="welcome-heading">Welcome to the squad</h1>
                        <p class="intro-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam
                            dolorum aliquam, quibusdam aperiam voluptatum.</p>

                        <form action="#" class="join-form">
                            <div class="form-group">
                                <label for="FirstName">Full Name</label>
                                <input type="text" id="FirstName" name="first_name" />
                            </div>

                            <div class="form-group">
                                <label for="LastName">Phone Number</label>
                                <input type="text" id="LastName" name="last_name" />
                            </div>

                            <div class="form-group">
                                <label for="Email">SUT Email</label>
                                <input type="email" id="Email" name="email" />
                            </div>

                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" id="Password" name="password" />
                            </div>

                            <div class="form-group">
                                <label for="PasswordConfirmation">Password Confirmation</label>
                                <input type="password" id="PasswordConfirmation" name="password_confirmation" />
                            </div>

                            <div class="checkbox-group">
                                <label for="MarketingAccept">
                                    <input type="checkbox" id="MarketingAccept" name="marketing_accept" />
                                    I want to receive emails about events, updates, and announcements.
                                </label>
                            </div>

                            <p class="terms-text">
                                By creating an account, you agree to our
                                <a href="#">terms and conditions</a> and <a href="#">privacy policy</a>.
                            </p>
                        </form>
                    </div>
                </main>
            </div>
        </section>
    </section> --}}

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Next Generation Technology</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollToPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/CustomEase.min.js"></script>
    <script src="script.js"></script>

</body>

</html>
