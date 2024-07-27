<?php
session_start();
include('../../auth/auth.php');

// Check if the user is authenticated and is of the correct type
if (isset($_SESSION['usertype']) && $_SESSION['usertype'] === 'user') {
    // User is authorized, continue displaying user dashboard
} else {
    // Redirect to login page if not authorized
    header("Location: ../../../reg&loginform/login.html");
    exit();
}
?>


















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kenswed Tech Club - User</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/08c0465673.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="header">
        <nav>
            <div>
                <h3>Welcome <span>
                        <?php  echo htmlspecialchars($_SESSION["username"]); ?>
                    </span>
                </h3>
            </div>
            <div class="nav-links" id="navLinks">
                <ul>
                    <li><a href="#index">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#">Blogs</a></li> <!--able to create, edit and delete post.-->
                    <li><a href="#">Games</a></li> <!--hope to appear soon.-->
                    <li><a href="#">Profile</a></li> <!--able to edit our profile--> 
                    <li><a href="#" onclick="confirmLogout()">Logout</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="toggleMenu()"></i>
        </nav>
        <p id="index" style="text-align: left; margin:10px;">Dashboard</p>
        <div class="text-box">
            <h1>Kenswed Tech Club</h1>
            <p>Welcome to the Kenswed Tech Club. Join us to explore the world of technology and innovation!</p>
            <a href="#" class="hero-btn">Visit us to know more</a>
        </div>
    </section>
    <section class="about" id="about">
        <h1>About Us</h1>
        <p>The Kenswed Tech Club is dedicated to nurturing tech talent and fostering innovation among students. We offer
            various workshops, hackathons, and projects to help students develop their skills and collaborate on tech
            solutions.</p>
    </section>
    <section class="events" id="events">
        <h1>Upcoming Events</h1>
        <div class="row">
            <div class="event-col">
                <h3>Workshop on AI</h3>
                <p>Join our upcoming workshop on Artificial Intelligence and learn the basics of AI and machine
                    learning.</p>
            </div>
            <div class="event-col">
                <h3>Hackathon 2024</h3>
                <p>Participate in our annual hackathon and collaborate with peers to create innovative tech solutions.
                </p>
            </div>
            <div class="event-col">
                <h3>Web Development Bootcamp</h3>
                <p>Sign up for our intensive bootcamp to learn web development from scratch.</p>
            </div>
        </div>
    </section>
    <section class="projects" id="projects">
        <h1>Our Projects</h1>
        <p>Explore the innovative projects developed by our members.</p>
        <div class="row">
            <div class="project-col">
                <h3>Web Development</h3>
                <p>Creating modern, responsive websites for local businesses.</p>
            </div>
            <div class="project-col">
                <h3>Mobile Apps</h3>
                <p>Developing mobile applications that solve real-world problems.</p>
            </div>
            <div class="project-col">
                <h3>Robotics</h3>
                <p>Building and programming robots for various tasks.</p>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <h1>Contact Us</h1>
        <p>We'd love to hear from you! Reach out to us for more information or any inquiries.</p>
        <div class="contact-form">
            <form id="contactForm">
                <input type="text" name="name" placeholder="Your Name">
                <input type="email" name="email" placeholder="Your Email">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" placeholder="Your Message"></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>
    <footer class="footer">
        <h4>About Us</h4>
        <p>We are a community of tech enthusiasts committed to learning and sharing knowledge.</p>
        <div class="icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin"></i>
        </div>
        <div>
            <p>Made by <i class="fa fa-heart-o"></i>
                <a href="#" style="color: orange;"> RegalBkim</a>
                web solution
            </p>
            <p>Powered by Kenswed Tech Club</p>
            <p>Sponsored by Kenswed Organisation</p>
        </div>
    </footer>
    <script src="js/main.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/formvalidation.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/login&registration.js"></script>
    <script src="js/logout.js"></script>
</body>

</html>