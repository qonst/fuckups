# Документы из html-like SVG

###Задача:
+ Реализовать генерацию pdf документов

###Решение:
+ Сделать шаблоны для документов на основе SVG экспорта из figma
+ Сохранять страницу в PDF с помощью Chrome Headless

###Факапы:
+ Полученные SVG файлы, хоть и были html-совместимыми, но все равно кривые (polis_legal_entity_multi.blade.php)
+ Практически весь текст был неизменяемым, тк слова имели явно указанные координаты
+ Пришлось городить костыль в виде <span> тега, расположенного поверх документа, подгадывая координаты (text.blade.php)
+ Большое количество однотипных файлов (по размерам видно)
