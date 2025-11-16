/**
 * SOTO VOKASI - Main JavaScript
 * Version: 1.0
 */

// ============================================
    // 1. NAVBAR ACTIVE + SMOOTH SCROLL
    // ============================================

// --- KODE LAMA (Burger & Scroll) ---
const burger = document.querySelector('.nav-burger');
const navMenu = document.querySelector('.nav-menu');
const navbar = document.querySelector('.navbar');

// Fungsi untuk toggle menu mobile
const mobileMenu = () => {
    navMenu.classList.toggle('active');
    burger.classList.toggle('toggle');
};
burger.addEventListener('click', mobileMenu);

// Fungsi untuk efek navbar saat di-scroll
const stickyNavbar = () => {
    if (window.scrollY > 20) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
};
window.addEventListener('scroll', stickyNavbar);


// ------------------------------------
// --- KODE BARU (Indikator Kotak) ---
// ------------------------------------

const navLinks = document.querySelectorAll('.nav-menu .nav-link');
const indicator = document.querySelector('.nav-menu .indicator');
const currentActive = document.querySelector('.nav-link.active');

// Fungsi untuk menggerakkan indicator
function moveIndicator(element) {
    if (element) {
        // Pindahkan indicator ke posisi link (element)
        indicator.style.width = `${element.offsetWidth}px`;
        indicator.style.left = `${element.offsetLeft}px`;
        
        // Ganti warna teks link (opsional, tapi bagus)
        navLinks.forEach(link => link.classList.remove('active'));
        element.classList.add('active');
    }
}

// 1. Pindahkan indicator ke link 'active' saat halaman dimuat
moveIndicator(currentActive);

// 2. Tambahkan event listener untuk setiap link
navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
        // Pindahkan indicator ke link yang di-klik
        moveIndicator(e.target);
    });
});

// 3. (Opsional tapi Penting) Atur ulang posisi indicator jika ukuran window berubah
window.addEventListener('resize', () => {
    const newActive = document.querySelector('.nav-link.active');
    moveIndicator(newActive);
});

// Tambahkan event listener 'scroll' ke window
window.addEventListener('scroll', stickyNavbar);

// ============================================
// 2. MENU FILTER
// ============================================
const menuFilters = document.querySelectorAll('.menu-filter');
const menuCards = document.querySelectorAll('.menu-card');

if (menuFilters.length > 0) {
    menuFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Remove active class from all filters
            menuFilters.forEach(f => f.classList.remove('active'));
            // Add active class to clicked filter
            this.classList.add('active');
            
            const filterValue = this.getAttribute('data-filter');
            
            // Filter menu cards
            menuCards.forEach(card => {
                if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
}

// ============================================
// 3. FAQ ACCORDION
// ============================================
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(item => {
    const question = item.querySelector('.faq-question');
    
    question.addEventListener('click', function() {
        // Close other items
        faqItems.forEach(otherItem => {
            if (otherItem !== item && otherItem.classList.contains('active')) {
                otherItem.classList.remove('active');
            }
        });
        
        // Toggle current item
        item.classList.toggle('active');
    });
});

// ============================================
// 4. CONTACT FORM
// ============================================
const contactForm = document.getElementById('contactForm');

if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const subject = document.getElementById('subject').value;
        const message = document.getElementById('message').value;
        
        // Create WhatsApp message
        const whatsappMessage = `Halo, saya ${name}%0A%0AEmail: ${email}%0ASubject: ${subject}%0A%0APesan:%0A${message}`;
        
        // WhatsApp URL (GANTI NOMOR INI!)
        const whatsappURL = `https://wa.me/6287785711752?text=${whatsappMessage}`;
        
        // Open WhatsApp
        window.open(whatsappURL, '_blank');
        
        // Reset form
        contactForm.reset();
        
        // Show success message
        alert('Terima kasih! Anda akan diarahkan ke WhatsApp.');
    });
}

// ============================================
// 5. SMOOTH SCROLL
// ============================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// ============================================
// 6. SCROLL TO TOP ON PAGE LOAD
// ============================================
window.addEventListener('load', function() {
    window.scrollTo(0, 0);
});


    