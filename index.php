<?php 

function taskN($task) {
   echo "<hr/><h3>Задача $task </h3><hr/>";
}

function hr() {
   echo '<hr/>';
}

taskN(1);

/* 1. Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'. */

$str = 'london is the capital of great britain';

echo ucwords($str);

taskN(2);

/* 2. Дана строка 'html <b>css</b> php'. Удалите теги из этой строки. С помощью функции explode запишите каждое слово этой строки в отдельный элемент массива. */

$str2 = 'html <b>css</b> php';

$str2 = strip_tags($str2);

print_r(explode(' ', $str2));

taskN(3);

/* 3. Дана строка. Перемешайте символы этой строки в случайном порядке. */

$str3 = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, blanditiis.';

echo str_shuffle($str3);

taskN(4);

/* 4. Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен. */

echo date('t');

taskN(5);

/* 5. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59', timestamp. */

echo date('Y-m-d');
hr();
echo date('d.m.Y');
hr();
echo date('d.m.y');
hr();
echo date('H:i:s');

taskN(6);

/* 6. В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня. */

function changeDate($str_date = '') { 
   if(!empty($str_date)) {
      $date = strtotime($str_date); 
      echo "Наша дата: <b>${str_date}</b>";
   } else {
      $date = date('Y-m-d', time());
      echo "Наша дата: <b>${date}</b>";
      $date = strtotime($date); 
   }
   hr();
   $new_date = date('Y-m-d', $date + (2*24*60*60));
   echo "Наша дата плюс 2 дня: <b>${new_date}</b>";
   hr();
   $new_date = date('Y-m-d', $date + (34*24*60*60));
   echo "Наша дата плюс 1 месяц и 3 дня: <b>${new_date}</b>";
   hr();
   $new_date = date('Y-m-d', $date + (365*24*60*60));
   echo "Наша дата плюс 1 год: <b>${new_date}</b>";
   hr();
   $new_date = date('Y-m-d', $date - (3*24*60*60));
   echo "Наша дата минус 3 дня: <b>${new_date}</b>";
}

$date = '2025-12-31';

changeDate();

taskN(7);

/* 7. Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'.Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'. */

$str_num = '1a2b3c4b5d6e7f8g9h0';

echo "Вариант 1";

hr();
$new_str = str_replace([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], '', $str_num);
echo $new_str;
hr();

echo "Вариант 2";

hr();
$regex = '/\d/';
$new_str2 = preg_replace($regex, '', $str_num);
echo $new_str2;

taskN(8);

/* 8. Даны числа 4, -2, 5, 19, -130, 0, 10. Найдите минимальное и максимальное число. */

$arr = [4, -2, 5, 19, -130, 0, 10];

echo "Дано: <pre>" . print_r($arr, true) . "</pre>";

echo "Минимальное число: " . min($arr);
echo '<br/>';
echo "Максимальное число: " . max($arr);

taskN(9);

/* 9. Выведите на экран случайное число от 1 до 100 */

echo rand(1, 100);

taskN(10);

/* 10. Создайте ассоциативный массив дней недели. Ключами в нем должны служить номера дней от начала недели (понедельник - должен иметь ключ 1, вторник - 2 и т.д.). Выведите на экран текущий день недели. */

$arr_week = [
   '1' => 'Понедельник',
   '2' => 'Вторник',
   '3' => 'Среда',
   '4' => 'Четверг',
   '5' => 'Пятница',
   '6' => 'Суббота',
   '7' => 'Воскресенье'
];


$day = (idate('w') == 0) ? (idate('w') + 7) : idate('w');

echo $arr_week[$day];

taskN(11);

/* 11. Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным */

function arr_sum($arr) {
   static $sum = 0;
   foreach($arr as $v) {
      if (is_array($v)) arr_sum($v);
      else $sum += $v;
   }
   return $sum;
}

echo arr_sum([[1, 2, 3], [4, [5, 8, 7], 5], [6]]);

taskN(12);

/* 12. Есть массив $array = array(1,1,1,2,2,2,2,3), необходимо вывести 1,2,3, то есть вывести без дублей при помощи лишь одного цикла и без использования функций PHP. */

$array = array(1,1,1,2,2,2,2,3);
for ($i = 0; $i < count($array); $i++) {
   if ($array[$i] == $array[$i+1]) {
      continue;
   } else echo $array[$i] . (($i == count($array) - 1) ? '. ' : ', ');
}

taskN(13);

/* 13. Используя ассоциативный массив, добавить на страницу навигационное меню вида:
<ul>
   <li><a href="index.php">Home</a></li>
   <li><a href="about.php">About</a></li>
   <li><a href="services.php">Services</a></li>
   <li><a href="catalog.php">Catalog</a></li>
   <li><a href="contacts.php">Contacts</a></li>
</ul>
Заполните массив соблюдая сл. условия: название индексов являются именем файла (без расширения), на который ссылается меню; значения массива явл. названиями пунктов меню. */

$arr_menu = [
   'index' => 'Home',
   'about' => 'About',
   'services' => 'Services',
   'catalog' => 'Catalog',
   'contacts' => 'Contacts'
];

echo "<ul>";
foreach($arr_menu as $k => $v) {
   echo "<li><a href=\"${k}.php\">${v}</a></li>";
}
echo "</ul>";

taskN(14);

/* 14. Вывести на черном фоне n красных квадратов случайного размера в случайной позиции в браузере. */

function show_square($n) {
   echo "<body style=\"background-color: black; color: white;\"></body>";
   for ($i = 0; $i < $n; $i++){
      $w = rand(10, 300);
      $h = $w;
      $t = rand(0, 100);
      $l = rand(0, 100);
      echo "<div style=\"background-color: red; width: ${w}px; height: ${h}px; position: fixed; top: ${t}%; left: ${l}%;\"></div>";
   }
}

// show_square(10);  

taskN(15);

/* 15. Дана строка с любыми символами. Для примера пусть будет '1234567890'. Нужно разбить эту строку в массив таким образом: array('1', '23', '456', '7890') и так далее пока символы в строке не закончатся. */

function cut_str($str) {
   for ($i = 0; ; $i++) {
      if ($i < strlen($str)) {
         $arr[] = substr($str, 0, $i+1);
         $str = substr($str, -(strlen($str) - ($i+1)));
      } elseif ($i == strlen($str)) {
         break;
      } else {
         $arr[] = $str;
         break;
      }
   }
   print_r($arr);
}

cut_str('12345546436583782723972948734563486');

taskN(16);

/* 16. Найдите сумму элементов массива между двумя нулями (первым и последним нулями в массиве). Если двух нулей нет в массиве, то выведите ноль. В массиве может быть более 2х нулей. Пример массива: [48,9,0,4,21,2,1,0,8,84,76,8,4,13,2] или [1,8,0,13,76,8,7,0,22,0,2,3,2] */

$arr = [1,8,0,13,76,8,7,0,22,0,2,3,2];
echo "Дано: <pre>" . print_r($arr, true) . "</pre>";

echo 'Вариант 1';
hr();

if (!in_array(0, $arr, true)) {
   echo '0';
} else {
   $key_null = array_search(0, $arr, true);
   $key_f_null = $key_null;
   foreach($arr as $key => $v) {
      if ($v == 0 && $key > $key_null) {
         $key_null = $key;
      }
   }
   if($key_null == $key_f_null) echo '0';
   else {
      $arr_sum = array_slice($arr, $key_f_null, $key_null+1 - $key_f_null);
      echo array_sum($arr_sum);
   }
}

$arr = [1,8,0,13,76,8,7,0,22,0,2,3,2];
hr(); 
echo 'Вариант 2';
hr();

$str_arr = implode(' ', $arr);
$first = strpos($str_arr, '0');
$last = strrpos($str_arr, '0', -1);
$str_arr = substr($str_arr, $first, $last - $first);
$arr_str = explode(' ', $str_arr);
$str_arr = substr($str_arr, $first, $last - $first);
echo array_sum($arr_str);

taskN(17);

/* 17. Сделайте функцию, которая будет генерировать случайный цвет в hex (dechex) формате (типа #ffffff). */

function randColor() {
   $hex = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f'];
   $hex_1 = $hex[rand(0, 15)];
   $hex_2 = $hex[rand(0, 15)];
   $hex_3 = $hex[rand(0, 15)];
   $hex_4 = $hex[rand(0, 15)];
   $hex_5 = $hex[rand(0, 15)];
   $hex_6 = $hex[rand(0, 15)];
   $hex_color = "#" . $hex_1 . $hex_2 . $hex_3 . $hex_4 . $hex_5 . $hex_6;
   return $hex_color;
}

echo '<div style=" width: 50px; height: 50px; background-color:' . randColor() . ';" ></div>';

taskN(18);

/* 18. Дана строка '332 441 550'. Найдите все места, где есть две одинаковых идущих подряд цифры и замените их на '!'. */

$str = '332 441 550';

function changeDuble($str) {
   echo "Дано: ${str} <br/>";
   $new_str = '';
   for ($i = 0; $i < strlen($str); $i++) {
      if ($str[$i] === $str[$i + 1]) {
         $new_str .= '!';
         $i++;
      } else {
         $new_str .= $str[$i];
      }
   }
   echo "Итог: ${new_str}";
}

changeDuble($str);

taskN(19);

/* 19. Напишите ф-цию строгой проверки ввода номера телефона в международном формате (<код страны> <код города или сети> <номер телефона>) и упрощенной проверки ввода простого номера с кодом и без него. Функция должна возвращать true или false. */

function check_phone_num($phone) {
   $phone = str_replace([' ', '-', '_'], '', $phone);
   $oper = substr($phone, 4, 2);
   // var_dump($oper == 29);
   echo $phone . "<br/>";
   if ($phone[0] != '+') return (false . "Нет знака '+'");
   else $phone = ltrim($phone, '\+');

   if (strlen($phone) == 12) {
   } else return (false . "Неправильно набран номер");

   if (!is_numeric($phone)) {
      return "Введите цифры номера";  
   }

   if (strpos($phone, '375') != 0   ) return (false . "Нет кода страны"); 

   if($oper == 29 || $oper == 25 || $oper == 33 || $oper == 44 || $oper == 17) return true;   
   else return (false . "Нет кода города или сети");   
}

$phone = '+ 375 33   653-45 - 52 ';

echo check_phone_num($phone);

taskN(20);

/* 20. Напишите ф-цию, которая должна проверить правильность ввода адреса эл. почты. Почта верна при условии:
a. весь адрес не должен содержать русские буквы и спецсимволы, кроме одной «собачки», знака подчеркивания, дефиса и точки, причем они не могут быть первыми и последними в адресе, и идти подряд, например: «..», «@.», «.@» или «@@», «_@», «@-», «--» и т.п.
b. имя эл. почты (до знака @) должно быть длиной более 2 символов, причем имя может содержать только буквы, цифры, но не быть первыми и единственными в имени, и точку;
c. после последней точки и после @, домен верхнего уровня (ru, by, com и т.п.) не может быть длиной менее 2 и более 11 символов. */

function check_email($email) {

   if (str_replace(' ', '', $email) !== $email) {
      echo "Ошибка: адрес не должен содержать пробелы";
      return false;
   }

   $alfa_ru = ['А', 'а', 'Б', 'б', 'В', 'в', 'Г', 'г', 'Д', 'д', 'Е', 'е', 'Ё', 'ё', 'Ж', 'ж', 'З', 'з', 'И', 'и', 'Й', 'й', 'К', 'к', 'Л', 'л', 'М', 'м', 'Н', 'н', 'О', 'о', 'П', 'п', 'Р', 'р', 'С', 'с', 'Т', 'т', 'У', 'у', 'Ф', 'ф', 'Х', 'х', 'Ц', 'ц', 'Ч', 'ч', 'Ш', 'ш', 'Щ', 'щ', 'Ъ', 'ъ', 'Ы', 'ы', 'Ь', 'ь', 'Э', 'э', 'Ю', 'ю', 'Я', 'я'];
   if (str_replace($alfa_ru, '', $email) !== $email) {
      echo "Ошибка: адрес не должен содержать русские буквы";
      return false;
   }

   $inhibit_sym = ['!', '#', '$', '%', '^', '&', '\'', '"', '*', '(', ')', '+', '=', '[', ']', '{', '}', '\\', '|', ':', ';', '<', ',', '>', '?', '/', '`', '~'];
   if (str_replace($inhibit_sym, '', $email) !== $email) {
      echo "Ошибка: адрес не должен содержать спецсимволы";
      return false;
   }

   if (strpos($email, '@') != strrpos($email, '@')) {
      echo "Ошибка: адрес может содержать только один знак '@'";
      return false;
   }

   $allow_sym = ['@', '-', '_', '.'];

   if (trim($email, implode('', $allow_sym)) !== $email) {
      echo "Ошибка: знаки '@', '-', '_', '.' не могут быть первыми и последними в адресе";
      return false;
   }

   $inhibit_comb = [];
   foreach($allow_sym as $v1) {
      foreach(array_reverse($allow_sym) as $v2) {
         array_push($inhibit_comb, $v1 . $v2); 
      }
   }

   if (str_replace($inhibit_comb, '', $email) !== $email) {
      echo "Ошибка: знаки '@', '-', '_', '.' не могут идти подряд";
      return false;
   }

   if (strpos($email, '@') <= 2) {
      echo "Ошибка: имя эл. почты до знака '@' должно быть длиной более 2 символов";
      return false;
   }

   $email_name = substr($email, 0, strpos($email, '@'));
   $arr_num = range(0, 9);

   if (ltrim($email_name, implode('', $arr_num)) !== $email_name) {
      echo "Ошибка: цифры не могут быть первыми в имени эл. почты до знака '@'";
      return false;
   }

   if (strpos($email, '@') > strrpos($email, '.')) {
      echo "Ошибка: укажите домен верхнего уровня";
      return false;
   }

   $domain = substr($email, strrpos($email, '.') + 1);

   if ((strlen($domain) < 2)) {
      echo "Ошибка: домен верхнего уровня не может быть длиной менее 2 символов";
      return false;
   }

   if ((strlen($domain) > 11)) {
      echo "Ошибка: домен верхнего уровня не может быть длиной более 11 символов";
      return false;
   }
   return true;
}

$mail = 'name.asd34@mail.ru';

var_dump(check_email($mail));