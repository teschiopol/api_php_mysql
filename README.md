# PHP Api - MySQL 💢

## Classes 🧮

- Category

- Post

### GET 📚

- host/api/[class]/read.php

- host/api/[class]/read.php?id=[n]

### POST 🖋

- host/api/[class]/create.php
```json
{
    "title": "Example",
    "body": "This is an example.",
    "author": "Pol",
    "category_id": "1"
}
```

### PUT 📝

- host/api/[class]/update.php
```json
{
    "id": 4,
    "title": "Example",
    "body": "This is an example.",
    "author": "Pol",
    "category_id": "1"
}
```

### DELETE ❌

- host/api/[class]/delete.php
```json
{
    "id": 4
}
```
