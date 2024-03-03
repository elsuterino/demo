# URL Shortener Service
This project is a URL shortener service that creates easy-to-remember short URLs from long URLs. Users can specify expiration for short URLs, request custom short URLs, and delete their short URLs before expiration.

## Environment Variables
Set the custom port for the web service using the environment variable:

```env
FORWARD_WEB_PORT=8787
```

## Running the Service with Docker
To start the service, use Docker Compose:

```bash
docker-compose up
```

## Testing
To run tests, execute the following command inside the Docker app or worker container:

```bash
php artisan test
```

## API Usage

### Creating a Shortened URL

**POST** `/url`

Parameters:
- `url` (required): The original URL you want to shorten.
- `slug` (optional): A custom slug for the shortened URL. If not provided, one will be generated automatically.
- `expires_at` (optional): The expiration date and time for the shortened URL in ISO 8601 format. If not provided, the URL will not expire.

### Redirecting to the Original URL

**GET** `/url/{slug}`

Provide the created slug to be redirected to the original URL.

### Deleting a Shortened URL

**DELETE** `/url/{slug}`

Provide the created slug to delete the shortened URL before it expires, if it has not already expired.
