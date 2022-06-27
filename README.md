# Random Profile API
This is a a simple-router application providing a simple
API for `aksoyih/random-profile`

## Install

    composer install

## set URL_BASE

Change the URL_BASE constant to match your URL_BASE
```php
define("URL_BASE", "URL_TO_API_PATH");
```


## API Reference

#### Get all items

```http
  GET /profile
```

#### Get a profile with specified gender

```http
  GET /profile/${gender}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `gender`      | `string` | **Required**. Must be either male or female|


```http
  GET /profile/${gender}/${nProfiles}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `gender`      | `string` | **Required**. Must be either male or female|
| `nProfiles`      | `integer` | **Required**. Amount of profiles wanted to be created. Must be an integer between 1 and 99|
