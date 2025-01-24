<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Lexend+Exa:wght@100..900&display=swap');

    :root {
        --primaryFont: 'Lexend Exa', sans-serif;
        --darkColor: #1a7431;
    }

    footer {
        background-color: var(--darkColor);
        padding: 5px;
        padding-inline: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        font-family: var(--primaryFont);
        flex-wrap: wrap;
        max-height: 40px;
    }

    .footer-left {
        display: flex;
        justify-content: flex-start;
    }

    .footer-left p {
        margin: 0;
        font-size: 14px;
    }

    .social-icons {
        display: flex;
        gap: 25px;
        justify-content: center;
    }

    .social-icons img {
        width: 24px;
        height: 24px;
    }

    .footer-right {
        display: flex;
        justify-content: flex-end;
    }

    .footer-right p {
        margin: 0;
        font-size: 14px;
    }

    footer a {
        color: #fff;
        text-decoration: none;
        font-size: 20px;
    }

    footer div {
        display: flex;
        align-items: center;
    }

    .social-icons a:hover {
        transform: rotateY(180deg);
    }

    @media (max-width: 768px) {
        footer {
            padding: 10px;
            padding-inline: 5px !important;
            flex-direction: column;
            align-items: center;
        }

        .footer-left,
        .footer-right {
            text-align: center;
            margin-bottom: 10px;
        }

        .social-icons {
            justify-content: center;
            margin-bottom: 10px;
            gap: 20px;
        }

        .social-icons img {
            width: 20px;
            height: 20px;
        }

        .footer-left p,
        .footer-right p {
            font-size: 12px;
        }

        footer a{
            font-size: 16px;
        }
    }

    @media (max-width: 480px) {
        .social-icons img {
            width: 18px;
            height: 18px;
        }

        .social-icons {
            justify-content: center;
            margin-bottom: 10px;
            gap: 10px;
        }

        .footer-left p,
        .footer-right p {
            font-size: 11px;
        }

        footer a{
            font-size: 12px;
        }
    }
</style>

<footer class="fixed-bottom">
    <div class="footer-left">
        <p class="text-white">CONTACT US</p>
    </div>
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://github.com" target="_blank" aria-label="Github"><i class="bi bi-github"></i></a>
        <img src="assets/images/fintalix-logo.webp" alt="Fintalix Logo">
    </div>
    <div class="footer-right">
        <p class="text-white">FINTALIX &copy; 2025</p>
    </div>
</footer>