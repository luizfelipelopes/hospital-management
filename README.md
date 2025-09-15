# Hospital Management Assessment

This is a project assessment about a implementation of Hospital Management System usin Laravel, REST API and Blade.

## About The Project

This assignment is designed for software engineers to build a simple web application using Laravel,
one of the most popular PHP frameworks. The project is a Mini Hospital Management System that teaches
how to handle user login, roles, and basic data management (like adding patients, doctors, and
appointments). 


## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine.

### Prerequisites

* Docker

### Installation

1.  Clone the repo
    ```sh
    git clone https://github.com/luizfelipelopes/hospital-management.git
    ```
3.  Start project
    ```sh
    make build
    ```
4.  Open the application in [http://localhost:8001](http://localhost:8001)

## Usage

You can use via web application or API REST.

You access the application using a default logins .

* Admin User:
    * **Email**: `admin@example.com`
    * **Password**: `password`

* Doctor User:
    * **Email**: `doctor@example.com`
    * **Password**: `password`

* Receptionist User:
    * **Email**: `receptionist@example.com`
    * **Password**: `password`


## API Endpoints

This section provides documentation for the available API endpoints.

The base url is: [http://localhost:8001](http://localhost:8001)


### Login 

#### `POST /api/v1/login`

**Request Body:**
```json
{
    "email": "test@example.com",
    "password": "password"
}   
```

### Patients

| Method | Endpoint | Description | Auth Required |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/v1/patients` | Fetches a list of all patients. | Yes |
| `POST` | `/api/v1/patients` | Creates a new patient. | Yes |
| `GET` | `/api/v1/patients/{id}` | Fetches a single patient by its ID. | Yes |
| `PUT` | `/api/v1/patients/{id}` | Updates a patient. | Yes |
| `DELETE`| `/api/v1/patients/{id}` | Deletes a patient. | Yes |

---

#### `POST /api/v1/patients`

Creates a new patient. The user must be authenticated.

**Request Body:**
```json
{
    "name":"Luiz Felipe Lopes 4",
    "email": "luiz.lopes6@mail.com",
    "phone": "38999999999",
    "address": "Rua teste",
    "city": "Diamantina",
    "state": "MG",
    "zipcode": "12300000",
    "country": "Brasil"
}   
```

#### `PUT /api/v1/patients/{id}`

Creates a new patient. The user must be authenticated.

**Request Body:**
```json
{
    "name":"Luiz Felipe Lopes 4",
    "email": "luiz.lopes6@mail.com",
    "phone": "38999999999",
    "address": "Rua teste",
    "city": "Diamantina",
    "state": "MG",
    "zipcode": "12300000",
    "country": "Brasil"
}   
```

### Doctors

| Method | Endpoint | Description | Auth Required |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/v1/doctors` | Fetches a list of all doctors. | Yes |
| `POST` | `/api/v1/doctors` | Creates a new doctor. | Yes |
| `GET` | `/api/v1/doctors/{id}` | Fetches a single doctor by its ID. | Yes |
| `PUT` | `/api/v1/doctors/{id}` | Updates a doctor. | Yes |
| `DELETE`| `/api/v1/doctors/{id}` | Deletes a doctor. | Yes |

---

#### `POST /api/v1/doctors`

Creates a new doctor. The user must be authenticated.

**Request Body:**
```json
{
    "name":"Luiz Felipe Doc",
    "email": "luiz.lopes5@mail.com",
    "password": "123456",
    "speciality": "cardiologist"
}  
```

#### `PUT /api/v1/doctors/{id}`

Creates a new doctor. The user must be authenticated.

**Request Body:**
```json
{
    "name":"Tyree Rogahn PhD",
    "email": "herzog.brandyn@example.org",
    "speciality": "psicologist"
} 
```

### Appointments

| Method | Endpoint | Description | Auth Required |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/v1/appointments` | Fetches a list of all appointments. | Yes |
| `POST` | `/api/v1/appointments` | Creates a new appointment. | Yes |
| `GET` | `/api/v1/appointments/{id}` | Fetches a single appointment by its ID. | Yes |
| `PUT` | `/api/v1/appointments/{id}` | Updates a appointment. | Yes |
| `DELETE`| `/api/v1/appointments/{id}` | Cancel a appointment. | Yes |

---

#### `POST /api/v1/appointments`

Creates a new appointment. The user must be authenticated.

**Request Body:**
```json
{
    "patient_id": 11,
    "doctor_id": 11,
    "appointment_date": "2025-08-30 00:40:00",
    "status":  "pending"
}   
```

#### `PUT /api/v1/appointments/{id}`

Updates a appointment. The user must be authenticated.

**Request Body:**
```json
{
    "patient_id": 12,
    "doctor_id": 11,
    "appointment_date": "2025-08-30 00:40:00",
    "status":  "pending"
}   
```

