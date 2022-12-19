//проверка повторения почты
async function uniq_username(Mail) {
    form=new FormData();
    form.append('Mail', Mail);
    try {
        const response = await fetch('testmail.php', {
            method: 'POST',
            body: form
        });
        let result = await response.text();
        console.log('Успех:', result);
        a=document.getElementById('mail');
        if (result=='false') {
            p=document.getElementById('error')
            p.style.display='block';
            document.getElementById('mail').className = "form-control is-invalid";
        }
        else{
            p.style.display='none';
            document.getElementById('mail').className = "form-control";
        }

    }
    catch (error) {
        console.log('Ошибка:', error);

    }
}
//p=Document.getElementById('error');
//         p.style.display='block';