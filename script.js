document.getElementById('contactForm').addEventListener('submit', async function(event) {
    event.preventDefault(); // Останавливаем стандартное поведение формы
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('send-mail.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.text();
        
        document.getElementById('responseMessage').textContent = result;
    } catch (error) {
        document.getElementById('responseMessage').textContent = 'Произошла ошибка при отправке сообщения';
    }
});
