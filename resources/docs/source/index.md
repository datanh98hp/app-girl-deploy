---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://127.0.0.1:8000/docs/collection.json)

<!-- END_INFO -->

#Auth


<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Đăng ký

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/register?name=itaque&email=et&password=consequatur&password_confirmation=magni" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/register"
);

let params = {
    "name": "itaque",
    "email": "et",
    "password": "consequatur",
    "password_confirmation": "magni",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Đăng ký thành công! Vui lòng kiểm tra email của bạn để xác thực tài khoản!",
    "data": {
        "name": "cong trinh",
        "email": "congtrinh17111992@gmail.com",
        "password": "11111111",
        "status": 0,
        "otp": 1619271832
    }
}
```

### HTTP Request
`POST api/register`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `name` |  optional  | 
    `email` |  optional  | 
    `password` |  optional  | 
    `password_confirmation` |  optional  | 

<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Đăng nhập

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/login?email=pariatur&password=sed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

let params = {
    "email": "pariatur",
    "password": "sed",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxODUwMTk0NiwiZXhwIjoxNjE4NTA1NTQ2LCJuYmYiOjE2MTg1MDE5NDYsImp0aSI6IklmNTZVQ1hqanNXR01NaFoiLCJzdWIiOjEsInBydiI6IjE4ZjM0M2FmNDdiNDMxZTk4OGJkYzNjNzcwMDRkNzUwMTFiMDBhODcifQ.-I6yC1vZW10Bg2SllTMkcAgNb3ur2JwbkjQh7mZMCqU",
    "msg": "Login successfully!"
}
```

### HTTP Request
`POST api/login`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `email` |  optional  | 
    `password` |  optional  | 

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

#Bank


<!-- START_a2b22a9c4347ca1d8df80cf9ea8ffc4d -->
## Danh sách thẻ ngân hàng

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/bank" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/bank"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List bank",
    "data": [
        {
            "id": 1,
            "name": "hoir casi",
            "number": "23131231321",
            "branch": "Hà Nội",
            "status": 1,
            "created_at": "2021-04-14 13:08:58",
            "updated_at": "2021-04-14 13:08:58"
        }
    ]
}
```

### HTTP Request
`GET api/bank`


<!-- END_a2b22a9c4347ca1d8df80cf9ea8ffc4d -->

<!-- START_eb161115fa8aaf05d3009779f79cc56d -->
## Thêm mới

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/bank/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/bank/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add bank successfully!",
    "data": {
        "name": "hoir casi",
        "number": "23131231321",
        "branch": "Hà Nội",
        "status": "1",
        "updated_at": "2021-04-14 13:08:58",
        "created_at": "2021-04-14 13:08:58",
        "id": 1
    }
}
```

### HTTP Request
`POST api/bank/add`


<!-- END_eb161115fa8aaf05d3009779f79cc56d -->

<!-- START_8b2c43e8be746f368050f5e6472cb82e -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/bank/update/quis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/bank/update/quis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit bank: hoir casi",
    "data": {
        "id": 1,
        "name": "hoir casi",
        "number": "23131231321",
        "branch": "Hà Nội",
        "status": 1,
        "created_at": "2021-04-14 13:08:58",
        "updated_at": "2021-04-14 13:08:58"
    }
}
```

### HTTP Request
`GET api/bank/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_8b2c43e8be746f368050f5e6472cb82e -->

<!-- START_aa29b5d6ba91285a09885266e72617ed -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/bank/update/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/bank/update/quia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update bank successfully!",
    "data": {
        "id": 1,
        "name": "hoir casi update",
        "number": "23131231321",
        "branch": "Hà Nội",
        "status": "1",
        "created_at": "2021-04-14 13:08:58",
        "updated_at": "2021-04-14 13:15:50"
    }
}
```

### HTTP Request
`POST api/bank/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_aa29b5d6ba91285a09885266e72617ed -->

<!-- START_3c8d5d3020e4492b87e6978dcb29e72b -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/bank/delete/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/bank/delete/quia"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove bank successfully!",
    "data": true
}
```

### HTTP Request
`POST api/bank/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_3c8d5d3020e4492b87e6978dcb29e72b -->

#Banner


<!-- START_400fb4764df1b01a1c10c5790a4e4f40 -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/banners" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/banners"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List banner",
    "data": [
        {
            "id": 1,
            "name": "banner 1",
            "image": "\/storage\/banners\/bFzSybpoGHbIrXGMWTwxZTvYnBWhf2Vbi2MN5FrO.jpg",
            "created_at": "2021-04-14 13:19:58",
            "updated_at": "2021-04-14 13:19:58"
        }
    ]
}
```

### HTTP Request
`GET api/banners`


<!-- END_400fb4764df1b01a1c10c5790a4e4f40 -->

<!-- START_00bed48f351db5c6ba99f09840153d4c -->
## Thêm

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/banners/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/banners/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add banner successfully!",
    "data": {
        "image": "\/storage\/banners\/bFzSybpoGHbIrXGMWTwxZTvYnBWhf2Vbi2MN5FrO.jpg",
        "name": "banner 1",
        "updated_at": "2021-04-14 13:19:58",
        "created_at": "2021-04-14 13:19:58",
        "id": 1
    }
}
```

### HTTP Request
`POST api/banners/add`


<!-- END_00bed48f351db5c6ba99f09840153d4c -->

<!-- START_0970d943171eae7c5353d3a868d0bb6e -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/banners/delete/quo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/banners/delete/quo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove banner successfully!",
    "data": true
}
```

### HTTP Request
`POST api/banners/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_0970d943171eae7c5353d3a868d0bb6e -->

#Bài viết


<!-- START_0bfd90e643e49117746d270f35d4851b -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/post" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/post"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List post",
    "data": [
        {
            "id": 1,
            "name": "Xe o t123aaaaaaaaq",
            "slug": "xe-o-to-1",
            "image": "\/storage\/posts\/HopF6CLpBhYl79eYvWSoZ4sf1FRqarmmO0DFHuJl.jpg",
            "description": "description",
            "content": "content",
            "views": 1,
            "status": 1,
            "created_at": "2021-04-14 05:36:35",
            "updated_at": "2021-04-14 05:36:35",
            "categories": [
                {
                    "id": 2,
                    "name": "Xe o t123",
                    "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
                    "status": 1,
                    "created_at": "2021-04-14 05:45:04",
                    "updated_at": "2021-04-14 05:45:04",
                    "type": 1,
                    "pivot": {
                        "post_id": 1,
                        "category_id": 2
                    }
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET api/post`


<!-- END_0bfd90e643e49117746d270f35d4851b -->

<!-- START_de43641373f8a38d069307c378c4f09c -->
## Thêm mới

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/post/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/post/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add post successfully!",
    "data": {
        "image": "\/storage\/posts\/IhlEhEA2jRboHbViKp3y8w3MSmgeSpiZcattlXZe.jpg",
        "name": "Xe o t123aaaas",
        "slug": "xe-o-to-2",
        "description": "description",
        "content": "content",
        "views": "1",
        "status": "1",
        "updated_at": "2021-04-14 14:58:58",
        "created_at": "2021-04-14 14:58:58",
        "id": 3
    }
}
```

### HTTP Request
`POST api/post/add`


<!-- END_de43641373f8a38d069307c378c4f09c -->

<!-- START_d802222bbca6b40815d1d75574366d33 -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/post/update/ullam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/post/update/ullam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update post successfully!",
    "data": {
        "id": 1,
        "name": "Xe tay gaa",
        "slug": "tay-ga",
        "image": "\/storage\/posts\/L7JSkW5wj1mWbcUJOOHU8gAYgwhj4xfK8X5FgaYT.jpg",
        "description": "moo tar",
        "content": "noi dung",
        "views": "12391230",
        "status": "1",
        "created_at": "2021-04-14 05:36:35",
        "updated_at": "2021-04-14 15:01:00"
    }
}
```

### HTTP Request
`POST api/post/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_d802222bbca6b40815d1d75574366d33 -->

<!-- START_675741f4578e95fdefe714f1ab935d8a -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/post/delete/cumque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/post/delete/cumque"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove post successfully!",
    "data": true
}
```

### HTTP Request
`POST api/post/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_675741f4578e95fdefe714f1ab935d8a -->

#Chuyên mục


<!-- START_db20564ba266cd451caac114b3eac8ab -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/category" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/category"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/category`


<!-- END_db20564ba266cd451caac114b3eac8ab -->

<!-- START_6a64bc9a9a2626c24d588ed934b765b8 -->
## Thêm mới

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/category/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/category/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add category successfully!",
    "data": {
        "image": "\/storage\/categories\/pDE445tqbD5iDsJxJp3xrLpMMrMJpIjATByeuKCu.jpg",
        "name": "Xe o to",
        "status": "1",
        "type": "1",
        "updated_at": "2021-04-14 13:44:36",
        "created_at": "2021-04-14 13:44:36",
        "id": 5
    }
}
```

### HTTP Request
`POST api/category/add`


<!-- END_6a64bc9a9a2626c24d588ed934b765b8 -->

<!-- START_b706ef7a9fae8af17f127e52e13329c9 -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/category/update/quis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/category/update/quis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit category: Xe o to",
    "data": {
        "id": 5,
        "name": "Xe o to",
        "image": "\/storage\/categories\/pDE445tqbD5iDsJxJp3xrLpMMrMJpIjATByeuKCu.jpg",
        "status": 1,
        "created_at": "2021-04-14 13:44:36",
        "updated_at": "2021-04-14 13:44:36",
        "type": 1,
        "brands": [
            {
                "id": 2,
                "name": "toyota",
                "image": "\/storage\/brands\/BzryU2WXxwMCjgPN1dq9ais0jPdXAhrY2leRq975.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:45:25",
                "updated_at": "2021-04-14 05:45:25",
                "pivot": {
                    "category_id": 5,
                    "brand_id": 2
                }
            }
        ]
    }
}
```

### HTTP Request
`GET api/category/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_b706ef7a9fae8af17f127e52e13329c9 -->

<!-- START_da36143dd3b243033101797857f31371 -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/category/update/hic" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/category/update/hic"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update category successfully!",
    "data": {
        "id": 5,
        "name": "Xe tay gaa",
        "image": "\/storage\/categories\/ZLwrsHzidu1JktqPsZmpCM0vMip34IW7TOXjo21P.jpg",
        "status": "1",
        "created_at": "2021-04-14 13:44:36",
        "updated_at": "2021-04-14 14:21:20",
        "type": "2"
    }
}
```

### HTTP Request
`POST api/category/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_da36143dd3b243033101797857f31371 -->

<!-- START_f5f0df53042f0a55c0e8ae793f657d96 -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/category/delete/molestiae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/category/delete/molestiae"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove category successfully!",
    "data": true
}
```

### HTTP Request
`POST api/category/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_f5f0df53042f0a55c0e8ae793f657d96 -->

#Liên hệ


<!-- START_3d6410776fd7f89f2233e62fa1ce5052 -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List contact",
    "data": [
        {
            "id": 1,
            "member_id": 2,
            "name": "hoir casi",
            "email": "a@gmail.com",
            "phone": 123456789,
            "content": "content",
            "status": 1,
            "created_at": "2021-04-14 14:32:09",
            "updated_at": "2021-04-14 14:32:09"
        }
    ]
}
```

### HTTP Request
`GET api/contact`


<!-- END_3d6410776fd7f89f2233e62fa1ce5052 -->

<!-- START_f1303120d8c71d5cf415ea64e0ee9adc -->
## Thêm mới

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/contact/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/contact/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List contact",
    "data": [
        {
            "id": 1,
            "member_id": 2,
            "name": "hoir casi",
            "email": "a@gmail.com",
            "phone": 123456789,
            "content": "content",
            "status": 1,
            "created_at": "2021-04-14 14:32:09",
            "updated_at": "2021-04-14 14:32:09"
        }
    ]
}
```

### HTTP Request
`POST api/contact/add`


<!-- END_f1303120d8c71d5cf415ea64e0ee9adc -->

<!-- START_48b89fb136d539fbcb976c7ab6cb0df5 -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/contact/update/eligendi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/contact/update/eligendi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit contact: hoir casi",
    "data": {
        "id": 1,
        "member_id": 2,
        "name": "hoir casi",
        "email": "a@gmail.com",
        "phone": 123456789,
        "content": "content",
        "status": 1,
        "created_at": "2021-04-14 14:32:09",
        "updated_at": "2021-04-14 14:32:09",
        "member": {
            "id": 2,
            "name": "cong trinh",
            "avatar": null,
            "email": "congtrinh1711199@gmail.com",
            "cover_image": null,
            "description": null,
            "address": null,
            "email_verified_at": null,
            "status": 1,
            "created_at": "2021-04-13 17:08:21",
            "updated_at": "2021-04-13 17:08:21"
        }
    }
}
```

### HTTP Request
`GET api/contact/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_48b89fb136d539fbcb976c7ab6cb0df5 -->

<!-- START_4c19fafebdaa8890391700c4276699e2 -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/contact/update/non" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/contact/update/non"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update contact successfully!",
    "data": {
        "id": 1,
        "member_id": "2",
        "name": "hoir casi update",
        "email": "a@gmail.com",
        "phone": "123456789",
        "content": "content",
        "status": "1",
        "created_at": "2021-04-14 14:32:09",
        "updated_at": "2021-04-14 14:36:20"
    }
}
```

### HTTP Request
`POST api/contact/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_4c19fafebdaa8890391700c4276699e2 -->

<!-- START_150d94039a789144409dd9b778f3adec -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/contact/delete/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/contact/delete/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove contact successfully!",
    "data": true
}
```

### HTTP Request
`POST api/contact/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_150d94039a789144409dd9b778f3adec -->

#Product


<!-- START_dc538d69a8586a7a3c36d4393cee42e6 -->
## Danh sách products

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/product" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/product"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List product",
    "data": [
        {
            "id": 1,
            "code": "123123",
            "name": "Xe o t123aaaaaaaaq",
            "slug": "xe-o-to-1",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/8yZeqjdUq9I0UNLaQxs7cyBqTeRBl6NuECXplMqk.jpg",
            "images": "[\"\\\/storage\\\/products\\\/AZlrbzjRkmAYa9v5hGKmFgYc2kvRvFw6lPFtsMrm.jpg\",\"\\\/storage\\\/products\\\/7Xmc3ig4PSf8dDyr3ZkjtsuF7klm8dSEKsl4qQSf.jpg\"]",
            "price": 100000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 05:39:36",
            "updated_at": "2021-04-14 05:39:36"
        },
        {
            "id": 2,
            "code": "123123",
            "name": "Xe o to ngon",
            "slug": "xe-o-to-2",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/qJEJUKnaPYh9urhTHkhwzPlWdtnDfoQgghXjoXpp.jpg",
            "images": "[\"\\\/storage\\\/products\\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\\/storage\\\/products\\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
            "price": 100000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 06:01:18",
            "updated_at": "2021-04-14 06:01:18"
        },
        {
            "id": 3,
            "code": "123123",
            "name": "Xe o to ngon",
            "slug": "xe-o-to-3",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/MOGyvpWg7CpRS51P1uMhiWsVuR0pdGo4vkCewrwa.jpg",
            "images": "[\"\\\/storage\\\/products\\\/B9hWM127FgXYH6sCMRoAWjrKcf8pKXDp6MXqlhNS.jpg\",\"\\\/storage\\\/products\\\/MxsHZM0w168KlgPHHb4PFNCT7NYqyNhHip4yoQFG.jpg\"]",
            "price": 200000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 06:03:06",
            "updated_at": "2021-04-14 06:03:06"
        }
    ],
    "brands": null
}
```

### HTTP Request
`GET api/product`


<!-- END_dc538d69a8586a7a3c36d4393cee42e6 -->

<!-- START_7baafa29f0adc5c6f9251b80fada1967 -->
## Thêm mới product

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/product/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/product/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add product successfully!",
    "data": {
        "image": "\/storage\/products\/F6aSl5EqM94CMcw4pJWCtnYH47sRBnBDhyj3Jr48.jpg",
        "images": "[\"\\\/storage\\\/products\\\/fKt1hXBu8bMuMTGI7GUNbF8PDOctaSkyPd5OHEb2.jpg\",\"\\\/storage\\\/products\\\/VSr7cnSASCBX0hYqhpjYSLZwq1nF1WUnPavJ1c3g.jpg\"]",
        "name": "Xe o to ngon -1",
        "slug": "xe-o-to-3-1",
        "code": "123123",
        "description": "description",
        "content": "content",
        "price": "200000000",
        "brand_id": "1",
        "status": "1",
        "updated_at": "2021-04-14 11:41:07",
        "created_at": "2021-04-14 11:41:07",
        "id": 4
    }
}
```

### HTTP Request
`POST api/product/add`


<!-- END_7baafa29f0adc5c6f9251b80fada1967 -->

<!-- START_530239e65bb57227ade133bc07068e40 -->
## Chi tiết product

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/product/update/exercitationem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/product/update/exercitationem"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit product: Xe o to ngon",
    "data": {
        "id": 3,
        "code": "123123",
        "name": "Xe o to ngon",
        "slug": "xe-o-to-3",
        "description": "description",
        "content": "content",
        "image": "\/storage\/products\/MOGyvpWg7CpRS51P1uMhiWsVuR0pdGo4vkCewrwa.jpg",
        "images": "[\"\\\/storage\\\/products\\\/B9hWM127FgXYH6sCMRoAWjrKcf8pKXDp6MXqlhNS.jpg\",\"\\\/storage\\\/products\\\/MxsHZM0w168KlgPHHb4PFNCT7NYqyNhHip4yoQFG.jpg\"]",
        "price": 200000000,
        "brand_id": 1,
        "status": 1,
        "created_at": "2021-04-14 06:03:06",
        "updated_at": "2021-04-14 06:03:06",
        "categories": [
            {
                "id": 1,
                "name": "Xe o t123aaaaaaaa",
                "image": "\/storage\/categories\/HhLM28z8FfRmnV5YFiwcSAs9SkYrraonUwKxPdtE.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:40:32",
                "updated_at": "2021-04-14 05:40:32",
                "type": 1,
                "pivot": {
                    "product_id": 3,
                    "category_id": 1
                }
            }
        ],
        "brand": {
            "id": 1,
            "name": "toyotasaa",
            "image": "\/storage\/brands\/jPAZpGgykm3yEx8pme6NeMu5lHWZe0xF3YCuwtJY.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:40:17",
            "updated_at": "2021-04-14 05:40:17"
        }
    }
}
```

### HTTP Request
`GET api/product/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | id của product

<!-- END_530239e65bb57227ade133bc07068e40 -->

<!-- START_ed3dda8a575f7bd63c23d7dd3c02844f -->
## Chỉnh sửa product

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/product/update/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/product/update/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update product successfully!",
    "data": {
        "id": 3,
        "code": "123456",
        "name": "Xe tay gaa",
        "slug": "tay-ga",
        "description": "moo tar",
        "content": "noi dung",
        "image": "\/storage\/products\/5njvg79Y6glkaKJE22B4Iq9KGxG4wImsy1FfFBn5.jpg",
        "images": "[\"\\\/storage\\\/products\\\/6zYS0UlXXDG9WpJCP42YnkmWZJSBD6R8fhSFJ5sa.jpg\"]",
        "price": "12391230",
        "brand_id": "10",
        "status": "1",
        "created_at": "2021-04-14 06:03:06",
        "updated_at": "2021-04-14 11:48:18"
    }
}
```

### HTTP Request
`POST api/product/update/{id}`


<!-- END_ed3dda8a575f7bd63c23d7dd3c02844f -->

<!-- START_5c9440f83448d1991232df8c8e567d6e -->
## Xóa product

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/product/delete/libero" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/product/delete/libero"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove product successfully!",
    "data": true
}
```

### HTTP Request
`POST api/product/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | Id product

<!-- END_5c9440f83448d1991232df8c8e567d6e -->

#Thông báo


<!-- START_4fb25366280aa776535df05d0448a156 -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/notification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/notification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List notification",
    "data": [
        {
            "id": 5,
            "post_id": null,
            "product_id": 4,
            "status": 1,
            "created_at": "2021-04-14 11:41:07",
            "updated_at": "2021-04-14 11:41:07",
            "product": {
                "id": 4,
                "code": "123123",
                "name": "Xe o to ngon -1",
                "slug": "xe-o-to-3-1",
                "description": "description",
                "content": "content",
                "image": "\/storage\/products\/F6aSl5EqM94CMcw4pJWCtnYH47sRBnBDhyj3Jr48.jpg",
                "images": "[\"\\\/storage\\\/products\\\/fKt1hXBu8bMuMTGI7GUNbF8PDOctaSkyPd5OHEb2.jpg\",\"\\\/storage\\\/products\\\/VSr7cnSASCBX0hYqhpjYSLZwq1nF1WUnPavJ1c3g.jpg\"]",
                "price": 200000000,
                "brand_id": 1,
                "status": 1,
                "created_at": "2021-04-14 11:41:07",
                "updated_at": "2021-04-14 11:41:07"
            },
            "post": null
        },
        {
            "id": 4,
            "post_id": null,
            "product_id": 3,
            "status": 1,
            "created_at": "2021-04-14 06:03:06",
            "updated_at": "2021-04-14 06:03:06",
            "product": null,
            "post": null
        },
        {
            "id": 3,
            "post_id": null,
            "product_id": 2,
            "status": 1,
            "created_at": "2021-04-14 06:01:18",
            "updated_at": "2021-04-14 06:01:18",
            "product": {
                "id": 2,
                "code": "123123",
                "name": "Xe o to ngon",
                "slug": "xe-o-to-2",
                "description": "description",
                "content": "content",
                "image": "\/storage\/products\/qJEJUKnaPYh9urhTHkhwzPlWdtnDfoQgghXjoXpp.jpg",
                "images": "[\"\\\/storage\\\/products\\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\\/storage\\\/products\\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
                "price": 100000000,
                "brand_id": 1,
                "status": 1,
                "created_at": "2021-04-14 06:01:18",
                "updated_at": "2021-04-14 06:01:18"
            },
            "post": null
        },
        {
            "id": 2,
            "post_id": null,
            "product_id": 1,
            "status": 1,
            "created_at": "2021-04-14 05:39:36",
            "updated_at": "2021-04-14 05:39:36",
            "product": {
                "id": 1,
                "code": "123123",
                "name": "Xe o t123aaaaaaaaq",
                "slug": "xe-o-to-1",
                "description": "description",
                "content": "content",
                "image": "\/storage\/products\/8yZeqjdUq9I0UNLaQxs7cyBqTeRBl6NuECXplMqk.jpg",
                "images": "[\"\\\/storage\\\/products\\\/AZlrbzjRkmAYa9v5hGKmFgYc2kvRvFw6lPFtsMrm.jpg\",\"\\\/storage\\\/products\\\/7Xmc3ig4PSf8dDyr3ZkjtsuF7klm8dSEKsl4qQSf.jpg\"]",
                "price": 100000000,
                "brand_id": 1,
                "status": 1,
                "created_at": "2021-04-14 05:39:36",
                "updated_at": "2021-04-14 05:39:36"
            },
            "post": null
        },
        {
            "id": 1,
            "post_id": 1,
            "product_id": null,
            "status": 1,
            "created_at": "2021-04-14 05:36:35",
            "updated_at": "2021-04-14 05:36:35",
            "product": null,
            "post": {
                "id": 1,
                "name": "Xe o t123aaaaaaaaq",
                "slug": "xe-o-to-1",
                "image": "\/storage\/posts\/HopF6CLpBhYl79eYvWSoZ4sf1FRqarmmO0DFHuJl.jpg",
                "description": "description",
                "content": "content",
                "views": 1,
                "status": 1,
                "created_at": "2021-04-14 05:36:35",
                "updated_at": "2021-04-14 05:36:35"
            }
        }
    ]
}
```

### HTTP Request
`GET api/notification`


<!-- END_4fb25366280aa776535df05d0448a156 -->

<!-- START_085a95c32ecaa132828faf40bc0eed7c -->
## Thêm mới

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/notification/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/notification/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add notification successfully!",
    "data": {
        "post_id": "2",
        "product_id": "1",
        "status": "1",
        "updated_at": "2021-04-14 14:43:15",
        "created_at": "2021-04-14 14:43:15",
        "id": 6
    }
}
```

### HTTP Request
`POST api/notification/add`


<!-- END_085a95c32ecaa132828faf40bc0eed7c -->

<!-- START_c6afe6d1e8caffa508e6c0f66229aec9 -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/notification/update/est" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/notification/update/est"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit notification",
    "data": {
        "id": 1,
        "post_id": 1,
        "product_id": null,
        "status": 1,
        "created_at": "2021-04-14 05:36:35",
        "updated_at": "2021-04-14 05:36:35",
        "product": null,
        "post": {
            "id": 1,
            "name": "Xe o t123aaaaaaaaq",
            "slug": "xe-o-to-1",
            "image": "\/storage\/posts\/HopF6CLpBhYl79eYvWSoZ4sf1FRqarmmO0DFHuJl.jpg",
            "description": "description",
            "content": "content",
            "views": 1,
            "status": 1,
            "created_at": "2021-04-14 05:36:35",
            "updated_at": "2021-04-14 05:36:35"
        }
    }
}
```

### HTTP Request
`GET api/notification/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_c6afe6d1e8caffa508e6c0f66229aec9 -->

<!-- START_85f2768322c18e06d4979aa3b12041ce -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/notification/update/odio" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/notification/update/odio"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update notification successfully!",
    "data": {
        "id": 1,
        "post_id": "1",
        "product_id": "2",
        "status": "1",
        "created_at": "2021-04-14 05:36:35",
        "updated_at": "2021-04-14 14:45:28"
    }
}
```

### HTTP Request
`POST api/notification/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_85f2768322c18e06d4979aa3b12041ce -->

<!-- START_e2cc922642d4a83670654e79b3b54367 -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/notification/delete/quam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/notification/delete/quam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove notification successfully!",
    "data": true
}
```

### HTTP Request
`POST api/notification/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_e2cc922642d4a83670654e79b3b54367 -->

#Thương hiệu


<!-- START_ec5d69c57dff08a10fad5f9cf208ad9f -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/brand" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/brand"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List brand",
    "data": [
        {
            "id": 3,
            "name": "toyota bad",
            "image": "\/storage\/brands\/mBqSbnq5JYuKKYO3WRVvqhcxmyjPeFPUttZ4bVuP.jpg",
            "status": 1,
            "created_at": "2021-04-14 06:00:48",
            "updated_at": "2021-04-14 06:00:48"
        },
        {
            "id": 2,
            "name": "toyota",
            "image": "\/storage\/brands\/BzryU2WXxwMCjgPN1dq9ais0jPdXAhrY2leRq975.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:25",
            "updated_at": "2021-04-14 05:45:25"
        },
        {
            "id": 1,
            "name": "toyotasaa",
            "image": "\/storage\/brands\/jPAZpGgykm3yEx8pme6NeMu5lHWZe0xF3YCuwtJY.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:40:17",
            "updated_at": "2021-04-14 05:40:17"
        }
    ]
}
```

### HTTP Request
`GET api/brand`


<!-- END_ec5d69c57dff08a10fad5f9cf208ad9f -->

<!-- START_64b77c7d24907f8badb486848cc3e240 -->
## Thêm

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/brand/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/brand/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add brand successfully!",
    "data": {
        "image": "\/storage\/brands\/p2EzeIykokmUpxtMwxJ56h9K24FhOuRQAGBAc6VU.jpg",
        "name": "toyota bad",
        "updated_at": "2021-04-14 13:27:15",
        "created_at": "2021-04-14 13:27:15",
        "id": 4,
        "categories": [
            {
                "id": 2,
                "name": "Xe o t123",
                "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:45:04",
                "updated_at": "2021-04-14 05:45:04",
                "type": 1,
                "pivot": {
                    "brand_id": 4,
                    "category_id": 2
                }
            }
        ]
    },
    "categories": [
        {
            "id": 2,
            "name": "Xe o t123",
            "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:04",
            "updated_at": "2021-04-14 05:45:04",
            "type": 1,
            "pivot": {
                "brand_id": 4,
                "category_id": 2
            }
        }
    ]
}
```

### HTTP Request
`POST api/brand/add`


<!-- END_64b77c7d24907f8badb486848cc3e240 -->

<!-- START_3e987c42b60349de96f26f3499e4ab98 -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/brand/update/amet" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/brand/update/amet"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit brand: toyotasaa",
    "data": {
        "id": 1,
        "name": "toyotasaa",
        "image": "\/storage\/brands\/jPAZpGgykm3yEx8pme6NeMu5lHWZe0xF3YCuwtJY.jpg",
        "status": 1,
        "created_at": "2021-04-14 05:40:17",
        "updated_at": "2021-04-14 05:40:17",
        "categories": [
            {
                "id": 1,
                "name": "Xe o t123aaaaaaaa",
                "image": "\/storage\/categories\/HhLM28z8FfRmnV5YFiwcSAs9SkYrraonUwKxPdtE.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:40:32",
                "updated_at": "2021-04-14 05:40:32",
                "type": 1,
                "pivot": {
                    "brand_id": 1,
                    "category_id": 1
                }
            },
            {
                "id": 1,
                "name": "Xe o t123aaaaaaaa",
                "image": "\/storage\/categories\/HhLM28z8FfRmnV5YFiwcSAs9SkYrraonUwKxPdtE.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:40:32",
                "updated_at": "2021-04-14 05:40:32",
                "type": 1,
                "pivot": {
                    "brand_id": 1,
                    "category_id": 1
                }
            },
            {
                "id": 2,
                "name": "Xe o t123",
                "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:45:04",
                "updated_at": "2021-04-14 05:45:04",
                "type": 1,
                "pivot": {
                    "brand_id": 1,
                    "category_id": 2
                }
            },
            {
                "id": 3,
                "name": "Xe o to",
                "image": "\/storage\/categories\/bbzyVRaSk4RjhcojCOFYh2ImM5mU0uSxg3xyZGhf.jpg",
                "status": 1,
                "created_at": "2021-04-14 06:00:33",
                "updated_at": "2021-04-14 06:00:33",
                "type": 1,
                "pivot": {
                    "brand_id": 1,
                    "category_id": 3
                }
            }
        ]
    },
    "categories": [
        {
            "id": 1,
            "name": "Xe o t123aaaaaaaa",
            "image": "\/storage\/categories\/HhLM28z8FfRmnV5YFiwcSAs9SkYrraonUwKxPdtE.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:40:32",
            "updated_at": "2021-04-14 05:40:32",
            "type": 1,
            "pivot": {
                "brand_id": 1,
                "category_id": 1
            }
        },
        {
            "id": 1,
            "name": "Xe o t123aaaaaaaa",
            "image": "\/storage\/categories\/HhLM28z8FfRmnV5YFiwcSAs9SkYrraonUwKxPdtE.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:40:32",
            "updated_at": "2021-04-14 05:40:32",
            "type": 1,
            "pivot": {
                "brand_id": 1,
                "category_id": 1
            }
        },
        {
            "id": 2,
            "name": "Xe o t123",
            "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:04",
            "updated_at": "2021-04-14 05:45:04",
            "type": 1,
            "pivot": {
                "brand_id": 1,
                "category_id": 2
            }
        },
        {
            "id": 3,
            "name": "Xe o to",
            "image": "\/storage\/categories\/bbzyVRaSk4RjhcojCOFYh2ImM5mU0uSxg3xyZGhf.jpg",
            "status": 1,
            "created_at": "2021-04-14 06:00:33",
            "updated_at": "2021-04-14 06:00:33",
            "type": 1,
            "pivot": {
                "brand_id": 1,
                "category_id": 3
            }
        }
    ]
}
```

### HTTP Request
`GET api/brand/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_3e987c42b60349de96f26f3499e4ab98 -->

<!-- START_6a09d798f3c7b1cc4d132d9978cb4655 -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/brand/update/dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/brand/update/dolores"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update brand successfully!",
    "data": {
        "id": 1,
        "name": "honda 11",
        "image": "\/storage\/brands\/umABXeXaSUanvCsES0MDEVRRX2z49e5FWkNtohcl.jpg",
        "status": 1,
        "created_at": "2021-04-14 05:40:17",
        "updated_at": "2021-04-14 13:29:38",
        "categories": [
            {
                "id": 2,
                "name": "Xe o t123",
                "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:45:04",
                "updated_at": "2021-04-14 05:45:04",
                "type": 1,
                "pivot": {
                    "brand_id": 1,
                    "category_id": 2
                }
            }
        ]
    },
    "categories": [
        {
            "id": 2,
            "name": "Xe o t123",
            "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:04",
            "updated_at": "2021-04-14 05:45:04",
            "type": 1,
            "pivot": {
                "brand_id": 1,
                "category_id": 2
            }
        }
    ]
}
```

### HTTP Request
`POST api/brand/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_6a09d798f3c7b1cc4d132d9978cb4655 -->

#Tin tức


<!-- START_6819399fe313ac709e9ef467adf20f02 -->
## Trang tin tức

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/new" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/new"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Home page",
    "categories": [
        {
            "id": 5,
            "name": "Xe tay gaa",
            "image": "\/storage\/categories\/ZLwrsHzidu1JktqPsZmpCM0vMip34IW7TOXjo21P.jpg",
            "status": 1,
            "created_at": "2021-04-14 13:44:36",
            "updated_at": "2021-04-14 14:21:20",
            "type": 2
        }
    ],
    "post": [
        {
            "id": 3,
            "name": "Xe o t123aaaas",
            "slug": "xe-o-to-2",
            "image": "\/storage\/posts\/IhlEhEA2jRboHbViKp3y8w3MSmgeSpiZcattlXZe.jpg",
            "description": "description",
            "content": "content",
            "views": 1,
            "status": 1,
            "created_at": "2021-04-14 14:58:58",
            "updated_at": "2021-04-14 14:58:58"
        }
    ]
}
```

### HTTP Request
`GET api/new`


<!-- END_6819399fe313ac709e9ef467adf20f02 -->

<!-- START_074527f67f2336085b0fee0606e472d4 -->
## Tin tức theo chuyên mục

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/new-of-category?category_id=sed" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/new-of-category"
);

let params = {
    "category_id": "sed",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Home page",
    "category": {
        "id": 2,
        "name": "Xe o t123",
        "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
        "status": 1,
        "created_at": "2021-04-14 05:45:04",
        "updated_at": "2021-04-14 05:45:04",
        "type": 1
    },
    "post": [
        {
            "id": 3,
            "name": "Xe o t123aaaas",
            "slug": "xe-o-to-2",
            "image": "\/storage\/posts\/IhlEhEA2jRboHbViKp3y8w3MSmgeSpiZcattlXZe.jpg",
            "description": "description",
            "content": "content",
            "views": 1,
            "status": 1,
            "created_at": "2021-04-14 14:58:58",
            "updated_at": "2021-04-14 14:58:58",
            "pivot": {
                "category_id": 2,
                "post_id": 3
            }
        }
    ]
}
```

### HTTP Request
`GET api/new-of-category`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `category_id` |  optional  | 

<!-- END_074527f67f2336085b0fee0606e472d4 -->

<!-- START_fc59faae85ad4637f767def943365e96 -->
## Chi tiết bài viết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/detail/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/detail/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Chi tiết bài viêt!",
    "posts": [
        {
            "id": 3,
            "name": "Xe o t123aaaas",
            "slug": "xe-o-to-2",
            "image": "\/storage\/posts\/IhlEhEA2jRboHbViKp3y8w3MSmgeSpiZcattlXZe.jpg",
            "description": "description",
            "content": "content",
            "views": 1,
            "status": 1,
            "created_at": "2021-04-14 14:58:58",
            "updated_at": "2021-04-14 14:58:58"
        }
    ]
}
```

### HTTP Request
`GET api/detail/{slug}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_fc59faae85ad4637f767def943365e96 -->

#Trang


<!-- START_68738def297b95bb2e4eb1cf4205a81a -->
## Danh sách

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/page" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/page"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List page",
    "data": [
        {
            "id": 1,
            "name": "Liên hệ",
            "slug": "xe-o-to-1",
            "content": "content",
            "status": 1,
            "created_at": "2021-04-14 14:49:23",
            "updated_at": "2021-04-14 14:49:23"
        }
    ]
}
```

### HTTP Request
`GET api/page`


<!-- END_68738def297b95bb2e4eb1cf4205a81a -->

<!-- START_a24673144b87141b9edd76416be82c7d -->
## Thêm mới

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/page/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/page/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Add page successfully!",
    "data": {
        "name": "Liên hệ",
        "slug": "xe-o-to-1",
        "content": "content",
        "status": "1",
        "updated_at": "2021-04-14 14:49:23",
        "created_at": "2021-04-14 14:49:23",
        "id": 1
    }
}
```

### HTTP Request
`POST api/page/add`


<!-- END_a24673144b87141b9edd76416be82c7d -->

<!-- START_2d00ab3ee0d61a076244142015d8e2eb -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/page/update/nam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/page/update/nam"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit page: Liên hệ",
    "data": {
        "id": 1,
        "name": "Liên hệ",
        "slug": "xe-o-to-1",
        "content": "content",
        "status": 1,
        "created_at": "2021-04-14 14:49:23",
        "updated_at": "2021-04-14 14:49:23"
    }
}
```

### HTTP Request
`GET api/page/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_2d00ab3ee0d61a076244142015d8e2eb -->

<!-- START_a4be3cb59badb10e9ebfc4450d247974 -->
## Chỉnh sửa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/page/update/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/page/update/et"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Update page successfully!",
    "data": {
        "id": 1,
        "name": "Xe tay gaa",
        "slug": "moo-tar",
        "content": "noi dung",
        "status": "1",
        "created_at": "2021-04-14 14:49:23",
        "updated_at": "2021-04-14 14:55:18"
    }
}
```

### HTTP Request
`POST api/page/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_a4be3cb59badb10e9ebfc4450d247974 -->

<!-- START_e5147bba4223857ff7abed11961bfc44 -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/page/delete/est" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/page/delete/est"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove page successfully!",
    "data": true
}
```

### HTTP Request
`POST api/page/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_e5147bba4223857ff7abed11961bfc44 -->

#Trang chủ


<!-- START_2b349f7f0ce1ce2ae13b3d385ae6e476 -->
## Trang chủ

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/home?keyword=aperiam&category_id=nesciunt&brand_id=nemo&sort_id=est&sort_price=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/home"
);

let params = {
    "keyword": "aperiam",
    "category_id": "nesciunt",
    "brand_id": "nemo",
    "sort_id": "est",
    "sort_price": "et",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Home page",
    "products": [
        {
            "id": 1,
            "code": "123123",
            "name": "Xe o t123aaaaaaaaq",
            "slug": "xe-o-to-1",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/8yZeqjdUq9I0UNLaQxs7cyBqTeRBl6NuECXplMqk.jpg",
            "images": "[\"\\\/storage\\\/products\\\/AZlrbzjRkmAYa9v5hGKmFgYc2kvRvFw6lPFtsMrm.jpg\",\"\\\/storage\\\/products\\\/7Xmc3ig4PSf8dDyr3ZkjtsuF7klm8dSEKsl4qQSf.jpg\"]",
            "price": 100000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 05:39:36",
            "updated_at": "2021-04-14 05:39:36"
        },
        {
            "id": 2,
            "code": "123123",
            "name": "Xe o to ngon",
            "slug": "xe-o-to-2",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/qJEJUKnaPYh9urhTHkhwzPlWdtnDfoQgghXjoXpp.jpg",
            "images": "[\"\\\/storage\\\/products\\\/gdUi1VzDkAxArwVRN1TYhoPxHvxw7PejM80CY3Rx.jpg\",\"\\\/storage\\\/products\\\/9YpYHPebNX8azYgsRJO0DwlKdGWz8kKI6ytWJxT2.jpg\"]",
            "price": 100000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 06:01:18",
            "updated_at": "2021-04-14 06:01:18"
        },
        {
            "id": 4,
            "code": "123123",
            "name": "Xe o to ngon -1",
            "slug": "xe-o-to-3-1",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/F6aSl5EqM94CMcw4pJWCtnYH47sRBnBDhyj3Jr48.jpg",
            "images": "[\"\\\/storage\\\/products\\\/fKt1hXBu8bMuMTGI7GUNbF8PDOctaSkyPd5OHEb2.jpg\",\"\\\/storage\\\/products\\\/VSr7cnSASCBX0hYqhpjYSLZwq1nF1WUnPavJ1c3g.jpg\"]",
            "price": 200000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 11:41:07",
            "updated_at": "2021-04-14 11:41:07"
        }
    ],
    "categories": [
        {
            "id": 2,
            "name": "Xe o t123",
            "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:04",
            "updated_at": "2021-04-14 05:45:04",
            "type": 1
        },
        {
            "id": 3,
            "name": "Xe o to",
            "image": "\/storage\/categories\/bbzyVRaSk4RjhcojCOFYh2ImM5mU0uSxg3xyZGhf.jpg",
            "status": 1,
            "created_at": "2021-04-14 06:00:33",
            "updated_at": "2021-04-14 06:00:33",
            "type": 1
        },
        {
            "id": 4,
            "name": "Xe o to 1",
            "image": "\/storage\/categories\/MsMc2QuUJn2EniWodh121sU0tUQTe6zAox1PmdoX.jpg",
            "status": 1,
            "created_at": "2021-04-14 07:03:03",
            "updated_at": "2021-04-14 07:03:03",
            "type": 1
        }
    ],
    "brands": [
        {
            "id": 2,
            "name": "toyota",
            "image": "\/storage\/brands\/BzryU2WXxwMCjgPN1dq9ais0jPdXAhrY2leRq975.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:25",
            "updated_at": "2021-04-14 05:45:25"
        },
        {
            "id": 3,
            "name": "toyota bad",
            "image": "\/storage\/brands\/mBqSbnq5JYuKKYO3WRVvqhcxmyjPeFPUttZ4bVuP.jpg",
            "status": 1,
            "created_at": "2021-04-14 06:00:48",
            "updated_at": "2021-04-14 06:00:48"
        },
        {
            "id": 4,
            "name": "toyota bad",
            "image": "\/storage\/brands\/p2EzeIykokmUpxtMwxJ56h9K24FhOuRQAGBAc6VU.jpg",
            "status": 1,
            "created_at": "2021-04-14 13:27:15",
            "updated_at": "2021-04-14 13:27:15"
        }
    ],
    "post": [
        {
            "id": 3,
            "name": "Xe o t123aaaas",
            "slug": "xe-o-to-2",
            "image": "\/storage\/posts\/IhlEhEA2jRboHbViKp3y8w3MSmgeSpiZcattlXZe.jpg",
            "description": "description",
            "content": "content",
            "views": 1,
            "status": 1,
            "created_at": "2021-04-14 14:58:58",
            "updated_at": "2021-04-14 14:58:58"
        }
    ]
}
```

### HTTP Request
`GET api/home`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `keyword` |  optional  | Từ khóa tìm kiếm
    `category_id` |  optional  | Id chuyên mục
    `brand_id` |  optional  | Id thương hiệu
    `sort_id` |  optional  | Sắp xếp theo product mới(cũ) nhất
    `sort_price` |  optional  | Sắp xếp theo giá tăng(giảm) dần

<!-- END_2b349f7f0ce1ce2ae13b3d385ae6e476 -->

<!-- START_c9c2b0a065cdd4441de5bdef5519ca6f -->
## Bộ lọc

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/home/filter?keyword=voluptatibus&category_id=harum&brand_id=non&sort_id=velit&sort_price=voluptas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/home/filter"
);

let params = {
    "keyword": "voluptatibus",
    "category_id": "harum",
    "brand_id": "non",
    "sort_id": "velit",
    "sort_price": "voluptas",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "List product",
    "products": [
        {
            "id": 1,
            "code": "123123",
            "name": "Xe o t123aaaaaaaaq",
            "slug": "xe-o-to-1",
            "description": "description",
            "content": "content",
            "image": "\/storage\/products\/8yZeqjdUq9I0UNLaQxs7cyBqTeRBl6NuECXplMqk.jpg",
            "images": "[\"\\\/storage\\\/products\\\/AZlrbzjRkmAYa9v5hGKmFgYc2kvRvFw6lPFtsMrm.jpg\",\"\\\/storage\\\/products\\\/7Xmc3ig4PSf8dDyr3ZkjtsuF7klm8dSEKsl4qQSf.jpg\"]",
            "price": 100000000,
            "brand_id": 1,
            "status": 1,
            "created_at": "2021-04-14 05:39:36",
            "updated_at": "2021-04-14 05:39:36"
        }
    ],
    "brands": [
        {
            "id": 2,
            "name": "toyota",
            "image": "\/storage\/brands\/BzryU2WXxwMCjgPN1dq9ais0jPdXAhrY2leRq975.jpg",
            "status": 1,
            "created_at": "2021-04-14 05:45:25",
            "updated_at": "2021-04-14 05:45:25",
            "pivot": {
                "category_id": 2,
                "brand_id": 2
            }
        },
        {
            "id": 3,
            "name": "toyota bad",
            "image": "\/storage\/brands\/mBqSbnq5JYuKKYO3WRVvqhcxmyjPeFPUttZ4bVuP.jpg",
            "status": 1,
            "created_at": "2021-04-14 06:00:48",
            "updated_at": "2021-04-14 06:00:48",
            "pivot": {
                "category_id": 2,
                "brand_id": 3
            }
        },
        {
            "id": 4,
            "name": "toyota bad",
            "image": "\/storage\/brands\/p2EzeIykokmUpxtMwxJ56h9K24FhOuRQAGBAc6VU.jpg",
            "status": 1,
            "created_at": "2021-04-14 13:27:15",
            "updated_at": "2021-04-14 13:27:15",
            "pivot": {
                "category_id": 2,
                "brand_id": 4
            }
        }
    ]
}
```

### HTTP Request
`GET api/home/filter`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `keyword` |  optional  | Từ khóa tìm kiếm
    `category_id` |  optional  | Id chuyên mục
    `brand_id` |  optional  | Id thương hiệu
    `sort_id` |  optional  | Sắp xếp theo product mới(cũ) nhất
    `sort_price` |  optional  | Sắp xếp theo giá tăng(giảm) dần

<!-- END_c9c2b0a065cdd4441de5bdef5519ca6f -->

#general


<!-- START_289a1228199f0ba9c1903a96ca80ed92 -->
## Xóa

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/brand/delete/placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/brand/delete/placeat"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Remove brand successfully!",
    "data": true,
    "categories": null
}
```

### HTTP Request
`POST api/brand/delete/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_289a1228199f0ba9c1903a96ca80ed92 -->

<!-- START_e217685fd5f47b21b959e911b73670dc -->
## Chi tiết

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/post/update/ut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/post/update/ut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": true,
    "msg": "Edit post: Xe o t123aaaaaaaaq",
    "data": {
        "id": 1,
        "name": "Xe o t123aaaaaaaaq",
        "slug": "xe-o-to-1",
        "image": "\/storage\/posts\/HopF6CLpBhYl79eYvWSoZ4sf1FRqarmmO0DFHuJl.jpg",
        "description": "description",
        "content": "content",
        "views": 1,
        "status": 1,
        "created_at": "2021-04-14 05:36:35",
        "updated_at": "2021-04-14 05:36:35",
        "categories": [
            {
                "id": 2,
                "name": "Xe o t123",
                "image": "\/storage\/categories\/ueLJ9uUlPvUHpZyhJ9wtvCjTGR3vdiR5cWQ0YBuc.jpg",
                "status": 1,
                "created_at": "2021-04-14 05:45:04",
                "updated_at": "2021-04-14 05:45:04",
                "type": 1,
                "pivot": {
                    "post_id": 1,
                    "category_id": 2
                }
            }
        ]
    }
}
```

### HTTP Request
`GET api/post/update/{id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  optional  | 

<!-- END_e217685fd5f47b21b959e911b73670dc -->

<!-- START_11a59c912a841991391d595f736a5a02 -->
## api/password/change
> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/password/change" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/password/change"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/password/change`


<!-- END_11a59c912a841991391d595f736a5a02 -->

<!-- START_3c520b0ccdbf5100b6f6994368e1b344 -->
## api/profile
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": false,
    "msg": "Xin vui lòng truyền vào token"
}
```

### HTTP Request
`GET api/profile`


<!-- END_3c520b0ccdbf5100b6f6994368e1b344 -->

<!-- START_a5c6310c3509d478f05f37ef97fbd242 -->
## api/profile/update
> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/profile/update" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/profile/update"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/profile/update`


<!-- END_a5c6310c3509d478f05f37ef97fbd242 -->

<!-- START_00e7e21641f05de650dbe13f242c6f2c -->
## api/logout
> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "status": false,
    "msg": "Xin vui lòng truyền vào token"
}
```

### HTTP Request
`GET api/logout`


<!-- END_00e7e21641f05de650dbe13f242c6f2c -->

<!-- START_79e313d4e87ca4a9186418aa833ba2ae -->
## api/confirm-account
> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/confirm-account" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/confirm-account"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/confirm-account`


<!-- END_79e313d4e87ca4a9186418aa833ba2ae -->

<!-- START_b7802a3a2092f162a21dc668479801f4 -->
## api/password/email
> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/password/email`


<!-- END_b7802a3a2092f162a21dc668479801f4 -->

<!-- START_8ad860d24dc1cc6dac772d99135ad13e -->
## api/password/reset
> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/password/reset`


<!-- END_8ad860d24dc1cc6dac772d99135ad13e -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->


