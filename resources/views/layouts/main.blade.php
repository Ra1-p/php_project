<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Salamaleykum social</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .error-modal {
            display: none; /* Скрываем модальное окно по умолчанию */
            position: fixed;
            top: 10%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f2f2f2;
            padding: 20px;
            border: 1px solid #d9534f;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .error-modal-content {
            max-height: 300px; /* Устанавливаем максимальную высоту для контента */
            overflow-y: auto; /* Добавляем вертикальную прокрутку при необходимости */
        }

        .close-btn {
            float: right;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
    <title>Main</title>
</head>
<body style="background-color: #eee;">
@if($errors->any())
    <div id="error-modal" class="error-modal">
        <div class="error-modal-content">
            <span class="close-btn" onclick="closeErrorModal()">&times;</span>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        // Функция для закрытия модального окна
        function closeErrorModal() {
            document.getElementById('error-modal').style.display = 'none';
        }

        // Показать модальное окно при загрузке страницы
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('error-modal').style.display = 'block';
        });
    </script>
@endif
</body>
</html>
