const scrollBtn = document.querySelector(".fixed-button"); 

window.onscroll = () => {
    // 1. Mudança: Troquei 'this.scrollY' por 'window.scrollY' (mais estável)
    // 2. Mudança: Ajustei para 300 para o botão aparecer mais cedo (opcional, mas recomendado)
    window.scrollY > 300 ? scrollBtn.classList.add("show") : scrollBtn.classList.remove("show");

    // 3. Mudança: REMOVI a linha 'classList.remove("show");' que estava solta e travava tudo
}

scrollBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        left: 0,
        behavior: 'smooth'
    })
})