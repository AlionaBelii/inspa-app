    document.addEventListener("DOMContentLoaded", () => {
        const search = document.querySelector("#search");
        const searchResults = document.querySelector("#search-results");

        if (!search || !searchResults)
        {
            console.error("Elements doesen't found.");
            return;
        }

        search.addEventListener("input", () => {
            const value = search.value.trim();
            searchResults.innerHTML = "";
            searchResults.classList.add("hidden");

            if (value.length > 2)
            {
                fetch(`http://localhost:8080/api/search?q=${value}`)
                    .then((res) => 
                    { 
                        if (!res.ok) { throw new Error(`HTTP error! Status: ${res.status}`); 
                        } return res.json(); 
                    })
                    .then((data) => {
                        const allResults = [];
                        const baseURL = "http://localhost:8080/storage/";

                        data.workers?.forEach((worker) => {
                            const slug = worker.slug_en || worker.slug_ru;
                            const imageUrl = worker.filename ? `${baseURL}workers/${worker.filename}` : 'https://placehold.co/50x50/e0e0e0/333?text=W';

                            allResults.push(`
                                <a href="/worker/${slug}" class="flex gap-2 hover:bg-gray-100 items-center">
                                    <img class='h-[50px] w-[50px] object-cover shadow-sm rounded-full border border-gray-200' 
                                    src="${imageUrl}"
                                    alt="${worker.altname}" 
                                    onerror="this.onerror=null; this.src='https://placehold.co/50x50/f0f0f0/333?text=N/A';">
                                    <p>${worker.fullname_en}</p>
                                </a>
                                `)
                        });

                        data.projects?.forEach((project) => {
                            const slug = project.id || project.id;
                            const imageUrl = project.filename ? `${baseURL}projects/${project.filename}` : 'https://placehold.co/50x50/e0e0e0/333?text=W';

                            allResults.push(`
                                <a href="/project/${slug}" class="flex gap-2 hover:bg-gray-100 items-center">
                                    <img class='h-[50px] w-[50px] object-cover shadow-sm rounded-full border border-gray-200' src="${imageUrl}" alt="${project.altname}">
                                    <p>${project.title_name_en}</p>
                                </a>
                                `)
                        });

                        data.categories?.forEach((category) => {
                            const slug = category.slug_en || category.slug_ru;
                            const imageUrl = category.filename ? `${baseURL}categories/${category.filename}` : 'https://placehold.co/50x50/e0e0e0/333?text=W';

                            allResults.push(`
                                <a href="/category/${slug}" class="flex gap-2 hover:bg-gray-100 items-center">
                                    <img class='h-[50px] w-[50px] object-cover shadow-sm rounded-full border border-gray-200' src="${imageUrl}" alt="${category.altname}">
                                    <p>${category.title_en}</p>
                                </a>
                                `)
                        });
                        
                        if (allResults.length > 0)
                        {
                            searchResults.innerHTML = `
                                    ${allResults.join('')} 
                            `;
                            searchResults.classList.remove("hidden");
                        } else {
                            searchResults.innerHTML = '<div class="p-2 text-gray-500 text-sm">Nothing found.</div>';
                            // searchResults.classList.add("hidden");
                        }
                    })
                    .catch(error => {
                        console.error("Fetch Error:", error);
                        searchResults.innerHTML = `<div class="p-2 text-red-500 text-sm">Error: ${error.message}</div>`;
                        searchResults.classList.add("hidden");
                    });
            }
    })
    document.addEventListener('click', (event) => {
        if (!search.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.classList.add("hidden");
        }
    });
})