This example onion architecture.<br>
The API of the matrix operation service. The services includes the following functional:<br>

1)Multiply matrix.<br>
2)Transponse matrix.<br>

# Structure

# Messanger config
```yaml
framework:
    messenger:
        default_bus: query.bus
        buses:
            query.bus:
            event.bus:
                default_middleware: allow_no_handlers
```
# Services conf
Configuration for query bus:<br>
```yaml
  _instanceof:
        App\Common\Query\QueryHandlerInterface:
            tags:
                - { name: messenger.message_handler, bus: query.bus }
```
Association messages query bus with handlers.<br>

# CQRS
This service use two "Query" defined in Application/Service/{Name action} directory.<br>
They are dispatched via the Symfony message bus(in this case query bus) which will forward them to the associated service handler.
Example of use you can see in MatrixController from src/Matrix/Presintation/Controller.

