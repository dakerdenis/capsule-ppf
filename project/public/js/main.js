// main.js

document.addEventListener('DOMContentLoaded', () => {
    /********** HEADER NAVIGATION AND SMOOTH SCROLL **********/
    const mainButtons = document.querySelectorAll('.main__buttons button')

    const header = document.querySelector('.header')
    const buttons = document.querySelectorAll('.header__nav__element button')

    const sections = document.querySelectorAll('section')
    const rectangle = document.getElementById('header_rectangle')
    let lastScrollTop = 0

    // Smooth scrolling to sections
    const scrollToSection = targetId => {
        const targetSection = document.getElementById(targetId)
        if (targetSection) {
            window.scrollTo({
                top: targetSection.offsetTop - 100, // Adjust for header height
                behavior: 'smooth'
            })
        }
    }
    // Attach event listeners to buttons inside Glide slider
    const glideButtons = document.querySelectorAll(
        '.glide__slide button[data-target]'
    )
    glideButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-target')
            scrollToSection(targetId)
        })
    })

    // Update rectangle position
    const updateRectanglePosition = button => {
        if (!button) return // Prevent errors if button is null
        const rect = button.getBoundingClientRect()
        const containerRect =
            button.parentElement.parentElement.getBoundingClientRect()
        const rectangleWidth = 17
        const buttonCenter = rect.left - containerRect.left + rect.width / 1.7
        rectangle.style.left = `${buttonCenter - rectangleWidth / 1.7}px`
    }

    // Scroll behavior for header and rectangle
    window.addEventListener('scroll', () => {
        const currentScroll =
            window.pageYOffset || document.documentElement.scrollTop

        // Make the header stick to the top
        if (currentScroll > 0) {
            header.style.position = 'fixed'
            header.style.top = '0'
            header.style.backgroundColor = 'rgba(0, 0, 0, 0.794)'
        } else {
            header.style.position = 'absolute'
            header.style.top = '50px'
            header.style.backgroundColor = 'rgba(0, 0, 0, 0.594)'
        }

        // Update rectangle position based on active section
        let activeButton = buttons[0]
        sections.forEach(section => {
            const rect = section.getBoundingClientRect()
            if (rect.top <= 100 && rect.bottom >= 100) {
                activeButton = document.querySelector(
                    `.header__nav__element button[data-target="${section.id}"]`
                )
            }
        })
        // If scrolled past the last section, use the "Contacts" button
        if (!activeButton) {
            const lastSection = sections[sections.length - 1]
            const rect = lastSection.getBoundingClientRect()
            if (rect.bottom <= window.innerHeight) {
                activeButton = document.querySelector(
                    `.header__nav__element button[data-target="${lastSection.id}"]`
                )
            }
        }

        updateRectanglePosition(activeButton)
    })

    // Initialize rectangle position
    updateRectanglePosition(buttons[0])

    // Header Navigation Buttons
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            scrollToSection(button.getAttribute('data-target'))
            updateRectanglePosition(button)
        })
    })

    // Main Buttons (Contact Us and Learn More)
    if (mainButtons.length >= 2) {
        mainButtons[0].addEventListener('click', () =>
            scrollToSection('contact')
        )
        mainButtons[1].addEventListener('click', () =>
            scrollToSection('about_us')
        )
    }

    /********** ANIMATIONS WITH INTERSECTION OBSERVER **********/
    const observeSectionAnimation = (
        wrapperSelector,
        imgSelector,
        animationName
    ) => {
        const wrapper = document.querySelector(wrapperSelector)
        const img = document.querySelector(imgSelector)
        if (wrapper && img) {
            const observer = new IntersectionObserver(
                entries => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            img.style.animationName = animationName
                            img.style.opacity = 1
                        }
                    })
                },
                { threshold: 0.5 }
            )
            observer.observe(wrapper)
        }
    }

    observeSectionAnimation(
        '.american__wrapper',
        '.american__car__block img',
        'moveCar'
    )
    observeSectionAnimation(
        '.contact_wrapper__animation',
        '.contact__car__block img',
        'moveCar'
    )

    /********** LANGUAGE DROPDOWN TOGGLE **********/
    const languageButton = document.getElementById('languageButton')
    const languageDropdown = document.getElementById('languageDropdown')

    if (languageButton && languageDropdown) {
        // Toggle dropdown visibility on button click
        languageButton.addEventListener('click', e => {
            e.stopPropagation() // Prevent click propagation
            const isDropdownVisible = languageDropdown.style.display === 'block'
            languageDropdown.style.display = isDropdownVisible
                ? 'none'
                : 'block'
        })

        // Close dropdown when clicking outside
        document.addEventListener('click', e => {
            if (!e.target.closest('.header__languages')) {
                languageDropdown.style.display = 'none'
            }
        })
    }


})