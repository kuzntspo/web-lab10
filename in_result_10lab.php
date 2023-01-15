<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="in_10lab_result.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nabla&family=Open+Sans:ital,wght@0,400;0,500;1,400;1,500&family=Poppins&display=swap" rel="stylesheet">
    <title>Result</title>
</head>
<body>
<?php
                function test_symbs($text){
                    $symbs=array(); // массив символов текста
                    $l_text=strtolower( $text ); // переводим текст в нижний регистр
                    // последовательно перебираем все символы текста
                    for($i=0; $i<strlen($l_text); $i++)
                    {
                        if( isset($symbs[$l_text[$i]]) ) // если символ есть в массиве
                        $symbs[$l_text[$i]]++; // увеличиваем счетчик повторов
                        else // иначе
                        $symbs[$l_text[$i]]=1; // добавляем символ в массив
                    }
                    echo 'Количество повторений каждого символа в тексте:<br>';
                    foreach($symbs as $key=>$row) {
                        if(iconv("cp1251", "utf-8",$key) == ' ') {
                            echo "Пробелов";
                        }
                        echo iconv("cp1251", "utf-8",$key.': '). $row . '<br>';
                    };
                } 

                if( isset($_POST['my_text']) & $_POST['my_text'] != '') // если передан текст для анализа
                {
                    $text = $_POST['my_text'];
                    echo '<p><b>Вы ввели следующий текст. </b><br><div class="text-itself">'.$text.'</div></p>'; // выводим текст
                    test_it(iconv("utf-8", "cp1251",$text.' ')); // анализируем текст 
                }
                else // если текста нет или он пустой
                    echo '<div class="src_error">Нет текста для анализа</div>'; // выводим ошибку


                function test_it($text){
                    // количество символов в тексте определяется функцией размера текста
                    $count = strlen($text) - 1;
                    echo 'Количество символов: '.$count.'<br>';
                    // определяем ассоциированный массив с цифрами
                    $cifra=array( '0'=>true, '1'=>true, '2'=>true, '3'=>true, '4'=>true,
                    '5'=>true, '6'=>true, '7'=>true, '8'=>true, '9'=>true );
                    
                    $letter=array(
                        'A'=>true, 'a'=>true, 'B'=>true, 'b'=>true, 'C'=>true, 'c'=>true, 'D'=>true, 'd'=>true, 'E'=>true, 'e'=>true, 'F'=>true, 'f'=>true, 'G'=>true, 'g'=>true, 'H'=>true, 'h'=>true, 'I'=>true, 'i'=>true,
                        'J'=>true, 'j'=>true, 'K'=>true, 'k'=>true, 'L'=>true, 'l'=>true, 'M'=>true, 'm'=>true, 'N'=>true, 'n'=>true, 'O'=>true, 'o'=>true, 'P'=>true, 'p'=>true, 'Q'=>true, 'q'=>true, 'R'=>true, 'r'=>true,
                        'S'=>true, 's'=>true, 'T'=>true, 't'=>true, 'U'=>true, 'u'=>true, 'V'=>true, 'v'=>true, 'W'=>true, 'w'=>true, 'X'=>true, 'x'=>true, 'Y'=>true, 'y'=>true, 'Z'=>true, 'z'=>true, 'А'=>true, 'а'=>true, 
                        'Б'=>true, 'б'=>true, 'В'=>true, 'в'=>true, 'Г'=>true, 'г'=>true, 'Д'=>true, 'д'=>true, 'Е'=>true, 'е'=>true, 'Ё'=>true, 'ё'=>true, 'Ж'=>true, 'ж'=>true, 'З'=>true, 'з'=>true, 
                        'И'=>true, 'и'=>true, 'Й'=>true, 'й'=>true, 'К'=>true, 'к'=>true, 'Л'=>true, 'л'=>true, 'М'=>true, 'м'=>true, 'Н'=>true, 'н'=>true, 'О'=>true, 'о'=>true, 'П'=>true, 'п'=>true, 'Р'=>true, 'р'=>true, 
                        'С'=>true, 'с'=>true, 'Т'=>true, 'т'=>true, 'У'=>true, 'у'=>true, 'Ф'=>true, 'ф'=>true, 'Х'=>true, 'х'=>true, 'Ц'=>true, 'ц'=>true, 'Ч'=>true, 'ч'=>true, 'Ш'=>true, 'ш'=>true, 'Щ'=>true, 'щ'=>true, 
                        'Ъ'=>true, 'ъ'=>true, 'Ы'=>true, 'ы'=>true, 'Ь'=>true, 'ь'=>true, 'Э'=>true, 'э'=>true, 'Ю'=>true, 'ю'=>true, 'Я'=>true, 'я'=>true
                    );
                    $big_letter = array(
                        'A'=>true, 'B'=>true, 'C'=>true, 'D'=>true, 'E'=>true, 'F'=>true, 'G'=>true, 'H'=>true, 'I'=>true, 'J'=>true, 'K'=>true, 'L'=>true, 'M'=>true, 'N'=>true, 'O'=>true, 'P'=>true, 'Q'=>true, 'R'=>true,
                        'S'=>true, 'T'=>true, 'U'=>true, 'V'=>true, 'W'=>true, 'X'=>true, 'Y'=>true, 'Z'=>true, 'А'=>true, 'Б'=>true, 'В'=>true, 'Г'=>true, 'Д'=>true, 'Е'=>true, 'Ё'=>true, 'Ж'=>true, 'З'=>true, 'И'=>true, 
                        'Й'=>true, 'К'=>true, 'Л'=>true, 'М'=>true, 'Н'=>true, 'О'=>true, 'П'=>true, 'Р'=>true, 'С'=>true, 'Т'=>true, 'У'=>true, 'Ф'=>true, 'Х'=>true, 'Ц'=>true, 'Ч'=>true, 'Ш'=>true, 'Щ'=>true, 'Ъ'=>true, 
                        'Ы'=>true, 'Ь'=>true, 'Э'=>true, 'Ю'=>true, 'Я'=>true
                    );
                    $little_letter = array(
                        'a'=>true, 'b'=>true, 'c'=>true, 'd'=>true, 'e'=>true, 'f'=>true, 'g'=>true, 'h'=>true, 'i'=>true, 'j'=>true, 'k'=>true, 'l'=>true, 'm'=>true, 'n'=>true, 'o'=>true, 'p'=>true, 'q'=>true, 'r'=>true,
                        's'=>true, 't'=>true, 'u'=>true, 'v'=>true, 'w'=>true, 'x'=>true, 'y'=>true, 'z'=>true, 'а'=>true, 'б'=>true, 'в'=>true, 'г'=>true, 'д'=>true, 'е'=>true, 'ё'=>true, 'ж'=>true, 'з'=>true, 'и'=>true, 
                        'й'=>true, 'к'=>true, 'л'=>true, 'м'=>true, 'н'=>true, 'о'=>true, 'п'=>true, 'р'=>true, 'с'=>true, 'т'=>true, 'у'=>true, 'ф'=>true, 'х'=>true, 'ц'=>true, 'ч'=>true, 'ш'=>true, 'щ'=>true, 'ъ'=>true, 
                        'ы'=>true, 'ь'=>true, 'э'=>true, 'ю'=>true, 'я'=>true
                    );
                    $punctuation_marks = array(
                        '.'=>true, ','=>true, '!'=>true, '?'=>true, '...'=>true, ':'=>true, ';'=>true, '-'=>true, '('=>true, ')'=>true, '"'=>true
                    );
                    // вводим переменные для хранения информации о:
                    $cifra_amount=0; // количество цифр в тексте
                    $letter_amount = 0; // количество букв в тексте
                    $big_letter_amount = 0; // количество заглавных букв в тексте
                    $little_letter_amount = 0; // количество прописных букв в тексте
                    $punctuation_marks_amount = 0; // количество знаков препинания в тексте
                    $word_amount=0; // количество слов в тексте
                    $word=''; // текущее слово
                    $words=array(); // список всех слов
                    $words_list = array();
                    for($i=0; $i<strlen($text); $i++) // перебираем все символы текста
                    {
                        if( array_key_exists(iconv("cp1251", "utf-8",$text[$i]), $cifra) ) // если встретилась цифра
                        $cifra_amount++; // увеличиваем счетчик цифр
                        if( array_key_exists(iconv("cp1251", "utf-8",$text[$i]), $letter) ) 
                        $letter_amount++; 
                        if( array_key_exists(iconv("cp1251", "utf-8",$text[$i]), $big_letter) ) 
                        $big_letter_amount++; 
                        if( array_key_exists(iconv("cp1251", "utf-8",$text[$i]), $little_letter) ) 
                        $little_letter_amount++; 
                        if( array_key_exists(iconv("cp1251", "utf-8",$text[$i]), $punctuation_marks) ) 
                        $punctuation_marks_amount++; 

                    // если в тексте встретился пробел или текст закончился
                    if( $text[$i]==' ' || $i==strlen($text)-1)
                    {
                        array_unshift($words_list, $word);

                    if( $word ) // если есть текущее слово
                    {
                    // если текущее слово сохранено в списке слов
                    if( isset($words[$word]) )
                    $words[ $word ]++; // увеличиваем число его повторов
                    else
                    $words[ $word ]=1; // первый повтор слова
                    }
                    $word=''; // сбрасываем текущее слово
                    }
                    else // если слово продолжается
                    $word.=$text[$i]; //добавляем в текущее слово новый символ
                    }
                    
                    // выводим количество цифр в тексте
                    echo 'Количество цифр: '.$cifra_amount.'<br>';
                    echo 'Количество букв: '.$letter_amount.'<br>';
                    echo 'Количество заглавных букв: '.$big_letter_amount.'<br>';
                    echo 'Количество маленьких букв: '.$little_letter_amount.'<br>';
                    echo 'Количество знаков препинания: '.$punctuation_marks_amount.'<br>';
                    echo 'Количество слов: '.count($words).'<br>';
                    echo 'Список слов:<br>';
                    sort($words_list);
                    foreach($words_list as $row) {
                        echo '<div class="words_list">'.iconv("cp1251", "utf-8",$row).': '.substr_count($text, $row)."</div><br>\r\n";
                    };
                    test_symbs($text);
                }
                ?>






























































<?php
/*
$text = $_POST['my_text'];
if( isset($text) && $text) {                                          // если передан текст для анализа
    echo '<p><b>Вы ввели следующий текст. </b><br><div class="text-itself">'.$text.'</div></p>'; // выводим текст
    test_it($text);  // анализируем текст
}
else {                                                                                           // если текста нет или он пустой
    echo '<div class="src_error">Нет текста для анализа</div>';                                  // выводим ошибку
}


/*
for($x=0; $x<strlen($text); $x++) {
    if (($text[$x] != "") || ($text[$x] != " ")) {
        test_it(iconv("utf-8", "cp1251", $text[$x]));
    }
}*/
//test_it(iconv("utf-8", "cp1251", $text));                                            // перед анализом перекодируем текст из UTF-8 в СР1251 


/*
function test_it($text) {
    $kol = test_symbs($text);
    
    // количество символов в тексте определяется функцией размера текста
    echo 'Количество символов: '.iconv_strlen($text).'<br>';
    // определяем ассоциированный массив с цифрами
    $cifra = array('0'=>true, '1'=>true, '2'=>true, '3'=>true, '4'=>true, '5'=>true, '6'=>true, '7'=>true, '8'=>true, '9'=>true);   
    // определяем ассоциированный массив со знаками препинания
    $punct_mark = array('.'=>true, ','=>true, '<'=>true, '>'=>true, '/'=>true, '?'=>true, '('=>true, ')'=>true, '['=>true, ']'=>true, '{'=>true, '}'=>true, "|"=>true, "!"=>true, "-"=>true);
    $letter_upper_rus = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 
        'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я');
    $letter_lower_rus = array('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 
        'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
    $letter_upper_eng = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
    $letter_lower_eng = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r',
        's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    // вводим переменные для хранения информации о:
    $cifra_amount = 0;                                                                             // количество цифр в тексте
    $word_amount = 0;                                                                              // количество слов в тексте
    $word = '';                                                                                    // текущее слово
    $words=array();                                                                              // список всех слов
    $letter_amount = 0;
    $letter_upper = 0;
    $letter_lower = 0;
    $punct_amount = 0;
    for($i=0; $i<strlen($text); $i++) {                                                          // перебираем все символы текста
        if(array_key_exists($text[$i], $cifra)) {                                               // если встретилась цифра
            $cifra_amount++;                                                                     // увеличиваем счетчик цифр
        }
        if(array_key_exists($text[$i], $punct_mark)) {                                             
            $punct_amount++;                                                                    
        }
        /*
        if (array_key_exists($text[$i], $letter_upper_eng)) {
            $letter_upper++;
        }
        if (array_key_exists($text[$i], $letter_lower_eng)) {
            $letter_lower++;
        }
        if (array_key_exists($text[$i], $letter_upper_rus)) {
            $letter_upper++;
        }
        if (array_key_exists($text[$i], $letter_lower_rus)) {
            $letter_lower++;
        }
        $letter_amount++;
        */
        
        /*
        else if(ctype_alpha($text[$i])) {
            if(ctype_upper($text[$i]) || (array_key_exists($text[$i], $letter_upper_rus))) {
                $letter_upper++;
            }
            else if (ctype_lower($text[$i]) || (array_key_exists($text[$i], $letter_lower_rus))) {
                $letter_lower++;
            }
            $letter_amount++;
        }
        




        //$capitalsAmount = mb_strlen( preg_replace('/[^A-ZА-ЯЁ]/u', '', $text), 'UTF-8');
        if($text[$i]==' ' || $i==strlen($text)-1) {                                            // если в тексте встретился пробел или текст закончился
            if($word) {                                                                        // если есть текущее слово
                if(isset($words[$word])) {                                                      // если текущее слово сохранено в списке слов
                    $words[$word]++;                                                           // увеличиваем число его повторов
                }
                else {
                    $words[$word]=1;                                                           // первый повтор слова
                }
            }
            $word='';                                                                            // сбрасываем текущее слово
        }
        else {                                                                                   // если слово продолжается
            $word.=$text[$i];                                                                    //добавляем в текущее слово новый символ
        }
    }
    //echo iconv("cp1251", "utf-8", $words[$word]);                     // непосредственно перед выводом перекодируем строку обратно в UTF-8
    //echo iconv("cp1251", "utf-8", $text);
    echo 'Количество цифр: '.$cifra_amount.'<br>';                                               // выводим количество цифр в тексте
    echo 'Количество слов: '.count($words).'<br>';                                 // выводим количество слов в тексте
    echo 'Количество знаков препинания: '.$punct_amount.'<br>'; 
    echo 'Количество букв: '.$letter_amount.'<br>';
    echo 'Количество заглавных букв: '.$letter_upper.'<br>';
    echo 'Количество строчных букв: '.$letter_lower.'<br>';

    echo implode("\r\n", $kol);

    $with_rus = iconv("cp1251", "utf-8", $text);
    

    //echo '<br>';
    //foreach ($kol as $row) {
    //    echo $row . " \r\n";
    //}
    //echo "Количество вхождений: ".$kol;
} 
//echo iconv("cp1251", "utf-8", $words[$word]);    





function test_symbs($text) {
    $symbs = array();                                                                                  // массив символов текста
    $l_text = strtolower($text);                                                                     // переводим текст в нижний регистр
    $both_arrays = array();
    // последовательно перебираем все символы текста
    for($i=0; $i<strlen($l_text); $i++) {
        if(isset($kol_symbs[$l_text[$i]]) && ($l_text[$i] != ' ')) {                                                                // если символ есть в массиве
            $kol_symbs[$l_text[$i]]++;                                                                           // увеличиваем счетчик повторов
        }
        else {
            if ($l_text[$i] != ' ') {
                $kol_symbs[$l_text[$i]]=1; // добавляем символ в массив
                $symbs[$i]=1;
            }
        }
    }
    //$result = array_combine($symbs, $kol_symbs);
    //echo iconv("cp1251", "utf-8", $text);
    //$result = $symbs + $kol_symbs;
    //return $result;
    
    //$res = array_combine($symbs, $kol_symbs);
    //$res = $symbs + $kol_symbs;
    //return $res;
    //echo implode("\r\n", $res);
    //for ($q=0; $q<count($symbs)*2; $q=($q+2)) {
    //    $both_arrays[$symbs[$q]]=$q;
        //$both_arrays[$symbs[$q+1]]=$kol_symbs[$q];
        
    //}
    return $both_arrays;
    
    //return $kol_symbs; // возвращаем массив с числом вхождений символов в тексте
}






/*
test_symbs(iconv("utf-8", "cp1251", $text)); 
function test_symbs($text) {
    //$with_rus = iconv("cp1251", "utf-8", $text);
    $kol_symbs = array();                                                                                  // массив символов текста
    $l_text = strtolower($text);                                                                     // переводим текст в нижний регистр
    $symbs = array();
    // последовательно перебираем все символы текста
    for($i=0; $i<strlen($l_text); $i++) {
        if(isset($kol_symbs[$l_text[$i]])) {                                                                // если символ есть в массиве
            $kol_symbs[$l_text[$i]]++;                                                                           // увеличиваем счетчик повторов
        }
        else {
            $kol_symbs[$l_text[$i]]=1; // добавляем символ в массив
            $symbs[$i] = $l_text[$i];
        }
    }
    //$result = array_combine($symbs, $kol_symbs);
    echo iconv("cp1251", "utf-8", $text);
    $result = $symbs + $kol_symbs;
    return $result;
    //return $kol_symbs; // возвращаем массив с числом вхождений символов в тексте
}
*/






/*
function test_symbs($text) {
    $kol_symbs = array();                                                                                  // массив символов текста
    $l_text = strtolower($text);                                                                     // переводим текст в нижний регистр
    $symbs = array();
    // последовательно перебираем все символы текста
    for($i=0; $i<strlen($l_text); $i++) {
        if(isset($kol_symbs[$l_text[$i]])) {                                                                // если символ есть в массиве
            $kol_symbs[$l_text[$i]]++;                                                                           // увеличиваем счетчик повторов
        }
        else {
            $kol_symbs[$l_text[$i]]=1; // добавляем символ в массив
            $symbs[$i] = $l_text[$i];
        }
    }
    //$result = array_combine($symbs, $kol_symbs);
    //echo iconv("cp1251", "utf-8", $text);
    $result = $symbs + $kol_symbs;
    return $result;
    //return $kol_symbs; // возвращаем массив с числом вхождений символов в тексте
}
*/ 
















?>






</body>
</html>