const client = contentful.createClient({
  space: 'e8cszf82luhj',
  accessToken: '93O9aSLHhv7i-HIHhhTEttq0-8Rpp22vOoNLz8i3KTk',
});

async function fetchEntries() {
  try {
    const entries = await client.getEntries({
      content_type: "fishCollection",
      // limit: 8 // Uncomment to retrieve only 8 entries
    });
    let items = entries.items;
    console.log(items);
    displayContent(items);
  } catch (error) {
    console.error('Error fetching entries:', error);
  }
}

function displayContent(entries) {
  const pro_container = document.getElementsByClassName('pro-container')[0]; // Get the first element with the class name 'pro-container'

  // Check if pro_container exists
  if (!pro_container) {
    console.error('pro-container not found');
    return;
  }

  pro_container.innerHTML = ''; // Clear any existing content in the container

  entries.forEach(entry => {
    const imageUrl = entry.fields.image?.fields.file.url;
    const name = entry.fields.name;
    const description = entry.fields.description;
    const company_name = entry.fields.companyName;
    const price = entry.fields.price;
    const rating = entry.fields.rating;
    const id = entry.sys.id;
    console.log(name);
    console.log(imageUrl);

    if (imageUrl && name && company_name && price && rating !== undefined) {
      const div = document.createElement('div');
      div.classList.add("pro");

      let stars = '';
      for (let i = 0; i < 5; i++) {
        stars += i < rating ? '<ion-icon name="star"></ion-icon>' : '<ion-icon name="star-outline"></ion-icon>';
      }

      div.innerHTML = `
        <a href="details.html?id=${id}">
          <img src="https:${imageUrl}" alt="fish">
          <div class="des">
            <h2>${name}</h2>
            <h4>${company_name}</h4>
            <div class="star">
              ${stars}
            </div>
            <h4 class="price">Rs ${price}/kg</h4>
          </div>
      
        </a>`;

      pro_container.appendChild(div);
    } else {
      console.error('Missing data for entry:', entry);
    }
  });
}

document.addEventListener('DOMContentLoaded', fetchEntries);
