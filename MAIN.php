<?php
echo "<h2>Задание 1: Работа с файлами</h2>";

// 1. Создание файла и запись строки
echo "<h3>1. Создание файла data.txt</h3>";
$file = fopen("data.txt", "w");
if (!$file) {
    echo "Ошибка создания файла<br>";
} else {
    $text = "Это тестовая строка для работы с файлами.";
    fwrite($file, $text);
    fclose($file);
    echo "Файл data.txt создан и записана строка<br>";
}

// 2. Чтение первых 20 символов
echo "<h3>2. Чтение первых 20 символов</h3>";
$file = fopen("data.txt", "r");
if (!$file) {
    echo "Ошибка открытия файла<br>";
} else {
    $content = fgets($file, 21); 
    echo "Прочитано: " . $content . "<br>";
    fclose($file);
}

// 3. Добавление новой строки в конец
echo "<h3>3. Добавление строки в конец файла</h3>";
$file = fopen("data.txt", "a");
if (!$file) {
    echo "Ошибка открытия файла<br>";
} else {
    $newText = "\nДобавлена новая строка.";
    fwrite($file, $newText);
    fclose($file);
    echo "Новая строка добавлена<br>";
}

// 4. Создание копии файла
echo "<h3>4. Создание копии файла</h3>";
if (copy("data.txt", "backup.txt")) {
    echo "Файл скопирован в backup.txt<br>";
} else {
    echo "Не удалось скопировать файл<br>";
}

// 5. Информация о файле data.txt
echo "<h3>5. Информация о файле data.txt</h3>";
if (file_exists("data.txt")) {
    echo "Размер файла: " . filesize("data.txt") . " байт<br>";
    echo "Дата последнего обращения: " . date("d.m.Y H:i:s", fileatime("data.txt")) . "<br>";
    echo "Тип файла: " . filetype("data.txt") . "<br>";
} else {
    echo "Файл не существует<br>";
}

// 6. Удаление backup.txt
echo "<h3>6. Удаление файла backup.txt</h3>";
if (file_exists("backup.txt")) {
    if (unlink("backup.txt")) {
        echo "Файл backup.txt успешно удалён<br>";
    } else {
        echo "Ошибка при удалении файла<br>";
    }
} else {
    echo "Файл backup.txt не найден<br>";
}

// Дополнительно: показать итоговое содержимое data.txt
echo "<h3>Итоговое содержимое data.txt:</h3>";
echo "<pre>";
readfile("data.txt");
echo "</pre>";
?>

<?php
echo "<h2>Задание 2: Мини-система логирования</h2>";

// 1. Проверка наличия файла log.txt
echo "<h3>1. Проверка наличия файла log.txt</h3>";
if (file_exists("log.txt")) {
    echo "Файл log.txt уже существует<br>";
} else {
    $file = fopen("log.txt", "w");
    if ($file) {
        fclose($file);
        echo "Файл log.txt создан<br>";
    } else {
        echo "Ошибка создания файла<br>";
    }
}

// 2. Добавление записи в лог
echo "<h3>2. Добавление записи в лог</h3>";
$file = fopen("log.txt", "a");
if (!$file) {
    echo "Ошибка открытия файла для записи<br>";
} else {
    $logEntry = "Запуск скрипта: " . date("d.m.Y H:i:s") . "\n";
    fwrite($file, $logEntry);
    fclose($file);
    echo "Запись добавлена в лог<br>";
}

// 3. Чтение и вывод всего лога
echo "<h3>3. Содержимое лог-файла</h3>";
$file = fopen("log.txt", "r");
if (!$file) {
    echo "Ошибка открытия файла для чтения<br>";
} else {
    echo "<pre>";
    echo "<b>--- Содержимое log.txt ---</b>\n";
    while (!feof($file)) {
        $line = fgets($file);
        if ($line !== false) {
            echo htmlspecialchars($line);
        }
    }
    echo "<b>--- Конец лога ---</b>";
    echo "</pre>";
    fclose($file);
}

// 4. Создание резервной копии
echo "<h3>4. Создание резервной копии</h3>";
if (copy("log.txt", "log_backup.txt")) {
    echo "Резервная копия создана: log_backup.txt<br>";
} else {
    echo "Не удалось создать резервную копию<br>";
}

// 5. Информация о файле log.txt
echo "<h3>5. Информация о файле log.txt</h3>";
if (file_exists("log.txt")) {
    echo "Файл существует: <b>Да</b><br>";
    echo "Время последнего изменения: " . date("d.m.Y H:i:s", filemtime("log.txt")) . "<br>";
    echo "Размер файла: " . filesize("log.txt") . " байт<br>";
    echo "Тип файла: " . filetype("log.txt") . "<br>";
} else {
    echo "Файл не существует<br>";
}

// Дополнительная информация
echo "<hr>";
?>