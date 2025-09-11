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

* PHP >= 8.2
* Composer
* Docker

### Installation

1.  Clone the repo
    ```sh
    git clone https://github.com/luizfelipelopes/hospital-management.git
    ```
2.  Setup your `.env` file
    ```sh
    cp env.example src/.env
    ```
3.  Start the docker containers
    ```sh
    docker compose up -d --build
    ```
4.  Open the application in [http://localhost:8001](http://localhost:8001)

## Usage

You can use via web application or API REST.

You access the application using a default login .
* **Admin Email**: `test@example.com`
* **Password**: `password`
