# Uso de la API
Disponemos de dos endpoints en este ejemplo:
```
http://localhost:8000/beers?food={string}

http://localhost:8000/beers/{id}
```

En el caso del endpoint `/beers?food=meal` se muestran tres campos, id, name y description:
```
[
  {
    "id": 26,
    "name": "Skull Candy",
    "description": "The first beer that we brewed on our newly commissioned 5000 litre brewhouse in Fraserburgh 2009. A beer with the malt and body of an English bitter, but the heart and soul of vibrant citrus US hops.",
  },
  {
    "id": 234,
    "name": "Neon Overlord",
    "description": "The Overlord of mango and chili IPA’s packs a fruity punch and then some. Pours a slightly hazy orange. A tropical fruit assault on the nose, with mango, pineapple, apricots and citrus. Hints of chili and sweet malts follow. Fruit dissipates to a chili kick, not hot but definitely there, followed by a long bitter finish. All hail to the hot tempered sweet toothed Lord.",
  }
]
```

En el caso del endpoint `/beers/26` se muestran ademas tres parámetros a mayores, image_url, tagline y first_brewed:
```
{
  "id": 26,
  "name": "Skull Candy",
  "description": "The first beer that we brewed on our newly commissioned 5000 litre brewhouse in Fraserburgh 2009. A beer with the malt and body of an English bitter, but the heart and soul of vibrant citrus US hops.",
  "image_url": "https://images.punkapi.com/v2/keg.png",
  "tagline": "Pacific Hopped Amber Bitter.",
  "first_brewed": "02/2010"
}
```