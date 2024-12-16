document.addEventListener("DOMContentLoaded", () => {
  // Add any common functionality here
});
const placeholderData = {
  "/api/hotels": [
    {
      id: 1,
      name: "Mountain View Hotel",
      location: "Naran",
      facilities: ["Wi-Fi", "Restaurant"],
      priceRange: { min: 50, max: 200 },
      sustainabilityScore: 8,
    },
    {
      id: 2,
      name: "Riverside Lodge",
      location: "Kaghan",
      facilities: ["Parking", "Spa"],
      priceRange: { min: 75, max: 250 },
      sustainabilityScore: 7,
    },
  ],
  "/api/routes": [
    {
      id: 1,
      name: "Naran to Lake Saiful Muluk",
      startPoint: "Naran",
      endPoint: "Lake Saiful Muluk",
      distance: 10,
      attractions: ["Lake Saiful Muluk", "Ansoo Lake"],
      weather: { temperature: 15, condition: "Sunny" },
    },
    {
      id: 2,
      name: "Kaghan Valley Tour",
      startPoint: "Kaghan",
      endPoint: "Babusar Top",
      distance: 50,
      attractions: ["Lulusar Lake", "Babusar Top"],
      weather: { temperature: 12, condition: "Partly Cloudy" },
    },
  ],
  "/api/hotels/1": {
    id: 1,
    name: "Mountain View Hotel",
    location: "Naran",
    description: "A beautiful hotel with panoramic mountain views.",
    facilities: ["Wi-Fi", "Restaurant", "Spa", "Parking"],
    images: [
      "https://source.unsplash.com/800x600/?hotel,mountains",
      "https://source.unsplash.com/800x600/?hotel,room",
      "https://source.unsplash.com/800x600/?hotel,lobby",
    ],
    roomTypes: [
      {
        id: 1,
        name: "Standard Room",
        description: "Comfortable room with basic amenities",
        price: 100,
      },
      {
        id: 2,
        name: "Deluxe Room",
        description: "Spacious room with mountain view",
        price: 150,
      },
      {
        id: 3,
        name: "Suite",
        description: "Luxurious suite with separate living area",
        price: 250,
      },
    ],
    sustainabilityScore: 8,
  },
  "/api/hotels/2": {
    id: 2,
    name: "Riverside Lodge",
    location: "Kaghan",
    description: "A cozy lodge situated by the serene river.",
    facilities: ["Wi-Fi", "Restaurant", "Fishing", "Hiking Trails"],
    images: [
      "https://source.unsplash.com/800x600/?lodge,river",
      "https://source.unsplash.com/800x600/?lodge,room",
      "https://source.unsplash.com/800x600/?lodge,nature",
    ],
    roomTypes: [
      {
        id: 1,
        name: "Standard Cabin",
        description: "Rustic cabin with river view",
        price: 120,
      },
      {
        id: 2,
        name: "Family Cabin",
        description: "Spacious cabin for families",
        price: 200,
      },
      {
        id: 3,
        name: "Luxury Treehouse",
        description: "Unique treehouse experience",
        price: 300,
      },
    ],
    sustainabilityScore: 7,
  },
  "/api/hotels/1/room-types": [
    { id: 1, name: "Standard Room", price: 100 },
    { id: 2, name: "Deluxe Room", price: 150 },
    { id: 3, name: "Suite", price: 250 },
  ],
  "/api/hotels/2/room-types": [
    { id: 1, name: "Standard Cabin", price: 120 },
    { id: 2, name: "Family Cabin", price: 200 },
    { id: 3, name: "Luxury Treehouse", price: 300 },
  ],
  "/api/calculate-cost": {
    hotelCost: 5000,
    fuelCost: 2000,
    totalCost: 7000,
  },
  "/api/book-hotel": {
    confirmationNumber: "NKBK12345",
  },
};
async function fetchData(url, options = {}) {
  await new Promise((resolve) => setTimeout(resolve, 1000));
  if (options.method === "POST") {
    console.log("POST data:", JSON.parse(options.body));
    return placeholderData[url] || { message: "Data submitted successfully" };
  }
  if (url.startsWith("/api/hotels/") && url.endsWith("/room-types")) {
    const hotelId = url.split("/")[3];
    return placeholderData[`/api/hotels/${hotelId}/room-types`] || [];
  }
  if (url.startsWith("/api/hotels/")) {
    const hotelId = url.split("/")[3];
    return placeholderData[`/api/hotels/${hotelId}`] || null;
  }
  return placeholderData[url] || [];
}
