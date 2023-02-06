# Coding challenge Junior Software Engineer

## Author

- [@Abderrazik Yassir](https://github.com/yassir-abderrazik)


## Table of contents

- [Product definition](#product-definition)
- [Category definition](#category-definition)
- [Run Locally](#run-locally)
  - [Installation](#Installation)
- [License](#license)

## Product definition

| field         | Type     | Description   |
| :------------ | :------- | :------------ |
| `name `       | `string` | **Required**. |
| `description` | `string` | **Required**. |
| `price`       | `float`  | **Required**. |
| `image`       | `string` | **Required**. |

## Category definition

| field             | Type            | Description   |
| :---------------- | :-------------- | :------------ |
| `name `           | `string`        | **Required**. |
| `parent_category` | `null/category` | **Optional**. |

## Run Locally

Clone the project

```bash
  git clone https://github.com/yassir-abderrazik/coding-challenge-junior-software-engineer.git
```

Go to the project directory

```bash
  cd project
```

### Installation

Use the package manager [composer](https://getcomposer.org/) to install required files

Install dependencies

```bash
  composer install
```
```bash
  npm install
```

Set the environment variables:

```bash
cp .env.example .env
# open .env and modify the environment variables (if needed)
```
```bash
php artisan key:generate
```

Start the server

```bash
  php artisan serve
```
```bash
  npm run dev
```
## License

[MIT](https://choosealicense.com/licenses/mit/)