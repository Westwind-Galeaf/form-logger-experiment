# Агрегация данных из форм

## Добавление сервиса

Операции производятся только при наличии ключа сервиса. Ключ генерируется при создании сервиса. 
За создание сервиса отвечает команда `php artisan service:register`

## Вставка записей

Для добавления записи требуется отправить __POST__ запрос на `/`. 
Запрос должен содержать обязательный параметр `key`, соответствующий сервису и произвольную структуру ключей и значений в качестве полей формы.

в случае успеха будет получен ответ в формате:

```json
{
    "success": true,
    "result": "Запись успешно добавлена"
}
```

В случае неудачи:

```json
{
    "success": false,
    "error": ["Список ошибок"]
}
```

