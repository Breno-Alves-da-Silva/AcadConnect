const reactionButtons = document.querySelectorAll(".reaction-btn");

reactionButtons.forEach((button) => {
    button.addEventListener("click", () => {
        button.classList.toggle("active");

        const number = button.querySelector("span");
        if (number) {
            let value = Number(number.textContent);
            number.textContent = button.classList.contains("active") ? value + 1 : value - 1;
        }
    });
});

const contactButtons = document.querySelectorAll(".contact-btn");
const modal = document.querySelector("#contactModal");
const closeModal = document.querySelector(".close-modal");

contactButtons.forEach((button) => {
    button.addEventListener("click", () => {
        if (modal) {
            modal.classList.add("show");
        }
    });
});

if (closeModal) {
    closeModal.addEventListener("click", () => {
        modal.classList.remove("show");
    });
}

if (modal) {
    modal.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.classList.remove("show");
        }
    });
}

const addCommentButton = document.querySelector(".add-comment-btn");
const commentTextarea = document.querySelector(".comment-form textarea");
const commentsList = document.querySelector(".comments-list");

if (addCommentButton && commentTextarea && commentsList) {
    addCommentButton.addEventListener("click", () => {
        const text = commentTextarea.value.trim();

        if (text === "") {
            alert("Digite um comentário antes de enviar.");
            return;
        }

        const comment = document.createElement("div");
        comment.classList.add("comment");
        comment.innerHTML = `<strong>Você</strong><p>${text}</p>`;

        commentsList.prepend(comment);
        commentTextarea.value = "";
    });
}

const shareButtons = document.querySelectorAll(".share-btn");

shareButtons.forEach((button) => {
    button.addEventListener("click", () => {
        alert("Link do artigo copiado! Quando tiver backend, aqui pode salvar o compartilhamento.");
    });
});
