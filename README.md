Statamic Embedly Plugin
================================

## Installing
1. Download the zip file (or clone via git) and unzip it or clone the repo into `/_add-ons/`.
2. Ensure the folder name is `embedly` (Github timestamps the download folder).
3. Enjoy.

## Usage

### Parameters

- `url`: URL of the video, tweet, photo, or other media supported by Embed.ly.
- `key`: Your API key. You can alternately set `embedly_api_key: YOURKEY` in your Statamic settings.yaml file and it will be available globally.
- `max_width`: The maximum width of the embedded object. Optional, but definitely recommended.


### Single Tag (simple embed mode)

Calling the plugin from the theme or within content will result in the embedded content being rendered in place.

```
{{ embedly url="VIDEO_TWEET_PHOTO_URL"}}
```

### Tag Pair (advanced mode)

Using this plugin as a tag pair gives you access to all data returned by the Embed.ly API. To see the returned values (which often include variables such as `html`, `title`, `description`, and so on), you can use the `{{ debug }}` variable to see the JSON response. Each of the keys returned will be available as a Statamic variable inside the tag pair.

**Example:**

```
{{ embedly url="VIDEO_TWEET_PHOTO_URL"}}
<h1>{{ title }}</h1>
<p>{{ description }}</p>
<div class="player">{{ html }}</div>
{{ /embedly }}
```

### Supported Services
View [Embed.ly's providers](http://embed.ly/providers) to see which services are supported.