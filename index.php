<?php
include 'koneksi.php';

$skills = mysqli_query($conn, "SELECT * FROM skills");

$experiences = mysqli_query($conn, "SELECT * FROM experiences");

$projects = mysqli_query($conn, "SELECT * FROM projects");

$certificates = mysqli_query($conn, "SELECT * FROM certificates");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Adella Putri | Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>

    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-floating fixed-top">
            <div class="container justify-content-between align-items-center">

                <a class="navbar-brand fw-bold text-pink glow-brand">
                    Adella’s Space ✿
                </a>

                <button class="navbar-toggler"
                    data-bs-toggle="collapse"
                    data-bs-target="#navMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center" id="navMenu">
                    <ul class="navbar-nav gap-4">
                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>

            </div>
        </nav>

        <section id="home" class="hero-section-modern text-center position-relative">

            <div class="container">

                <span class="badge bg-pink text-white mb-4 px-3 py-2 rounded-pill shadow">
                    ⋆｡‧˚ʚ Adella’s Portfolio ɞ˚‧｡⋆
                </span>

                <h1 class="display-3 fw-bold text-pink mb-3">
                    {{ nama }}
                </h1>

                <p class="lead text-muted mb-4">
                    Information Systems Student | Tech & Design Enthusiast
                </p>

                <button class="btn btn-hero-modern rounded-pill px-4"
                    @click="toggleGreeting">
                    Say Hello ✿
                </button>

                <transition name="fade">
                    <p v-if="greetingVisible"
                        class="mt-4 fw-semibold text-pink hero-greeting">
                        Welcome to my portfolio spaceᯓ★
                    </p>
                </transition>

                <div class="hero-image-wrapper mt-5">
                    <img src="images/adell.jpeg"
                        class="hero-image-modern">
                </div>

            </div>

        </section>

        <section id="about" class="container my-5">

            <h2 class="section-title text-center">About Me</h2>

            <div class="card p-4 shadow-sm mb-5 glass-card">
                <p>
                    Hi! I'm {{ nama }}, an Information Systems student passionate about technology development and digital design — welcome to my space.
                </p>

                <button class="btn btn-outline-pink mt-3"
                    @click="showAbout = !showAbout">
                    Toggle More Info
                </button>

                <p v-if="showAbout" class="mt-3">
                    I’m currently developing my skills in web and mobile development while deepening my understanding of information technology. I enjoy learning new things, exploring ideas, and continuously improving my abilities to contribute to meaningful digital solutions.
                </p>
            </div>


            <h4 class="mb-4 text-pink">Skills</h4>

            <?php while ($skill = mysqli_fetch_assoc($skills)) { ?>
                <div class="mb-3">
                    <label class="fw-semibold"><?= $skill['name']; ?></label>
                    <div class="progress">
                        <div class="progress-bar"
                            role="progressbar"
                            style="width: <?= $skill['level']; ?>%">
                            <?= $skill['level']; ?>%
                        </div>
                    </div>
                </div>
            <?php } ?>

            <h4 class="mt-5 mb-4 text-pink">Organizational Experience</h4>

            <div class="timeline">
                <?php while ($exp = mysqli_fetch_assoc($experiences)) { ?>
                    <div class="timeline-item">
                        <h6 class="fw-bold"><?= $exp['title']; ?></h6>
                        <small class="text-muted"><?= $exp['subtitle']; ?></small>
                        <p class="mb-0"><?= $exp['description']; ?></p>
                    </div>
                <?php } ?>
            </div>

            <h4 class="mt-5 mb-4 text-pink">Academic Projects</h4>

            <div class="row g-4">
                <?php while ($project = mysqli_fetch_assoc($projects)) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow project-card-modern">
                            <div class="card-body">
                                <h6 class="fw-bold"><?= $project['title']; ?></h6>
                                <p class="small"><?= $project['description']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </section>

        <section id="certificates" class="container my-5">

            <h2 class="section-title text-center">Certificates</h2>

            <div class="row g-4">
                <?php while ($cert = mysqli_fetch_assoc($certificates)) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card shadow cert-card">
                            <img src="<?= $cert['image']; ?>" class="card-img-top">
                            <div class="card-body text-center">
                                <h6><?= $cert['title']; ?></h6>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </section>

        <section id="contact" class="container my-5">

            <h2 class="section-title text-center">Contact Me</h2>

            <div class="card glass-card p-4 shadow-lg">

                <form @submit.prevent="submitForm">

                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text"
                            class="form-control"
                            v-model="form.name"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control"
                            rows="4"
                            v-model="form.message"
                            required></textarea>
                    </div>

                    <button type="submit"
                        class="btn bg-pink text-white rounded-pill px-4">
                        Send Message ❤︎
                    </button>

                </form>

                <div v-if="formSubmitted"
                    class="alert alert-success mt-4">
                    ✨ Thank you {{ lastSender }}! Your message has been received.
                </div>

            </div>

        </section>

        <footer class="text-center py-4 bg-pink text-white">
            © 2026 Adella Putri | Built with Bootstrap & Vue ✦
        </footer>

    </div>

    <script>
        const {
            createApp
        } = Vue

        createApp({
            data() {
                return {
                    nama: "Adella Putri",
                    greetingVisible: false,
                    showAbout: false,
                    formSubmitted: false,
                    lastSender: "",

                    form: {
                        name: "",
                        message: ""
                    },
                }
            },

            methods: {
                toggleGreeting() {
                    this.greetingVisible = !this.greetingVisible
                },
                submitForm() {
                    this.lastSender = this.form.name
                    this.formSubmitted = true
                    this.form.name = ""
                    this.form.message = ""
                }
            }
        }).mount('#app')
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>