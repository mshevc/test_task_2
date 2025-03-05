DIRECTORY STRUCTURE
-------------------

      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      exceptions/         contains common project exceptions
      restApi/            contains base API classes
      runtime/            contains files generated during runtime
      services/           contains API implementations
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      web/                contains the entry script and Web resources


INSTALLATION
------------

### Install with Docker

Clone project

    git clone https://github.com/mshevc/test_task_2.git
    cd <project directory>

Start the container in directory with project

    docker-compose up --build -d
    
You can then access the POST SumEven endpoint

    POST http://localhost:8000/api/v1/sum-even
    Body: 
    {
        "numbers": [1, 2, 3, 6]
    } 

TESTING
-------

### Running PHPUnit tests

To execute PHPUnit tests with Docker do the following:  

Start the container

    docker-compose up --build

Run tests

    docker exec -it yii2-api-app vendor/bin/phpunit tests/unit/sumEven
