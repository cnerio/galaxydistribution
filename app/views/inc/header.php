<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo SITENAME; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
  <script>
    tailwind = window.tailwind || {};
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              blue: '#0b73c9',
              navy: '#071426',
              slate: '#6b7280',
              border: '#d9e1ea'
            }
          },
          fontFamily: {
            sans: ['Barlow', 'sans-serif'],
            display: ['Space Grotesk', 'sans-serif']
          },
          boxShadow: {
            card: '0 16px 30px rgba(7, 20, 38, 0.08)'
          },
          backgroundImage: {
            'hero-glow': 'radial-gradient(circle at 15% 35%, rgba(71, 157, 255, 0.95), transparent 18%), radial-gradient(circle at 42% 12%, rgba(255, 214, 102, 0.6), transparent 16%), radial-gradient(circle at 72% 24%, rgba(255, 132, 74, 0.45), transparent 18%), radial-gradient(circle at 88% 44%, rgba(255, 126, 185, 0.55), transparent 20%), linear-gradient(108deg, #081326 0%, #263b7a 38%, #4b4177 58%, #8a4160 76%, #221515 100%)'
          }
        }
      }
    };
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: #f8fafc;
    }

    .hero-stars {
      background-image: url('<?php echo URLROOT; ?>/img/galaxybacground-scaled.webp');
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .hero-stars::before,
    .hero-stars::after {
      content: '';
      position: absolute;
      inset: 0;
      pointer-events: none;
      opacity: 0.85;
    }

    .hero-stars::before {
      background-image:
        radial-gradient(circle, rgba(255, 255, 255, 0.9) 0 1.2px, transparent 1.4px),
        radial-gradient(circle, rgba(255, 255, 255, 0.65) 0 0.9px, transparent 1.1px),
        radial-gradient(circle, rgba(255, 239, 191, 0.75) 0 1px, transparent 1.2px);
      background-size: 170px 170px, 130px 130px, 210px 210px;
      background-position: 0 0, 38px 55px, 105px 18px;
      animation: driftStars 24s linear infinite;
    }

    .hero-stars::after {
      background-image:
        linear-gradient(115deg, transparent 15%, rgba(255, 255, 255, 0.13) 48%, transparent 80%),
        radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.28), transparent 55%);
      mix-blend-mode: screen;
      animation: pulseNebula 7s ease-in-out infinite alternate;
    }

    .hero-slide {
      position: absolute;
      inset: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      opacity: 0;
      pointer-events: none;
      transition: opacity 280ms ease;
    }

    .hero-slide.is-active {
      opacity: 1;
      pointer-events: auto;
    }

    .hero-dot.is-active {
      background: rgba(255, 255, 255, 0.95);
      border-color: rgba(255, 255, 255, 0.95);
    }

    .hero-nav {
      opacity: 0;
      transform: translateY(-50%) scale(0.96);
      transition: opacity 180ms ease, transform 180ms ease;
    }

    .hero-panel:hover .hero-nav,
    .hero-panel:focus-within .hero-nav {
      opacity: 1;
      transform: translateY(-50%) scale(1);
    }

    .text-shadow{
        text-shadow: 2px 2px 2px #000000;
    }

    .bg-brand-blue {
        background-color: rgba(0, 113, 206, 1);
    }

    .mobile-nav.is-open {
      display: flex;
    }

    @keyframes driftStars {
      from {
        transform: translate3d(0, 0, 0);
      }

      to {
        transform: translate3d(-18px, 12px, 0);
      }
    }

    @keyframes pulseNebula {
      from {
        opacity: 0.45;
      }

      to {
        opacity: 0.85;
      }
    }
  </style>
</head>