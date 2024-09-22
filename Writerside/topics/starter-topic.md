# IoTCloudSync

IoTCloudSync is a modern IoT cloud platform designed for seamless device communication and data management. Utilizing MQTT for efficient message
brokering, the platform leverages Laravel's robust framework, enhanced by Livewire, Tailwind CSS, Alpine.js, and Jetstream, to offer a responsive
and dynamic user experience. The platform provides real-time data visualization, device management, and secure API integrations, making it the ideal
solution for connecting and controlling IoT devices in a cloud environment.


```mermaid
graph TD
    subgraph IoT Devices
        device1[Sensor 1 - Temperature]
        device2[Sensor 2 - Humidity]
        device3[Actuator - Light Control]
    end

    subgraph MQTT Broker
        broker[MQTT Broker]
    end

    subgraph Cloud Infrastructure
        laravel[Laravel App]
        database[(Database)]
        api[API]
    end

    device1 -->|Publish| broker
    device2 -->|Publish| broker
    device3 -->|Publish/Subscribe| broker

    broker -->|Forward Data| laravel
    laravel -->|Process & Store Data| database
    laravel -->|Provide API| api
    api -->|Data & Control| laravel
    broker -->|Send Commands| device3

```

```mermaid
graph TD
    sensor[Sensor] -->|Publish| broker[MQTT Broker]
    device[Device] -->|Publish/Subscribe| broker
    broker -->|Forward Data| laravel[Laravel App]
    laravel -->|Send Commands| broker
    broker -->|Forward Commands| device

```
