Проєкт має  mvc архітектуру, зроблений на кастомном фреймворком, з використанням докера.
Тут є елементі SOLID 
Використано патерн Repository
З типізованим стелем
0) composer install 
1) Щоб запустити проджект нам потрібний докер  docker-compose up
2) Після того ми можемо зайти на головну та  заповнити данні
1) Всі поля обов'язкові
2) Потрібна  валідна пошта, наприклад  demy2@ukr.net (Також це поле унікальне )
3) Щоб паролі співбадати 
Після того коли  ми додамо користувача в проєкті зявиться файл registration_log.txt  з логами
Та покаже нам таблицю  з данними, а  форма  закриється, також я  вирішив реалізувати це на сесіях, щоб можна було додати користувачів для більшого тесту
(Як  що потрібно перепишу на чистий масив)
