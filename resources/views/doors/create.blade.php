<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <header class="text-center">
                <h2 class="text-2xl font-medium uppercase text-gray-700 mb-4">
                    Add Door
                </h2>
            </header>
            <form method="POST" action="{{ route('storeDoor') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label
                        for="name"
                        class="inline-block text-lg text-gray-800 mb-2"
                        >Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        placeholder="Door Name"
                        value="{{ old('name') }}"
                    />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label
                        for="sku"
                        class="inline-block text-lg text-gray-800 mb-2"
                        >SKU#</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="sku"
                        placeholder="Door SKU#"
                        value="{{ old('sku') }}"
                    />
                    @error('sku')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                  <div x-data="imgPreview" x-cloak>
                    <label for="photo" class="inline-block text-lg text-gray-800 mb-2">
                        Photo
                    </label>
                    <input
                      type="file"
                      id="photo"
                      class="border border-gray-200 rounded p-2 w-full mb-3"
                      name="photo"
                      x-ref="myFile"
                      accept="image/*"
                      @change="previewFile"
                    />
                    <template x-if="imgsrc">
                      <img 
                        :src="imgsrc" 
                        class="imgPreview w-48"
                        alt="door photo"
                      />
                    </template>
                    @error('photo')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <label for="categories" class="inline-block text-lg text-gray-800 mb-2"
                  >Categories</label
                >
                <div class="w-full mb-8 h-64 ">
                  <select id="categories" name="categories[]" multiple x-data="multiselect">
                    @foreach($classifications as $classification)
                      <optgroup label="{{ $classification->name }}">
                        @foreach ($classification->categories as $category)
                        <option value="{{ $category->id }}" {{ (is_array(old('categories')) && in_array($category->id, old('categories'))) ? 'selected' : '' }}>{{  ucfirst($category->name) }}</option>
                        @endforeach
                      </optgroup>
                    @endforeach
                  </select>
                </div>
                @error('categories')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                <div class="mb-6 flex flex-col justify-center">
                <div class="mb-6 flex flex-col justify-center">
                    <button
                        class="bg-primary text-white rounded py-2 px-4 hover:bg-primary2 transition ease-out duration-200"
                    >
                      Add Door
                    </button>
                    <a href="/internal/door/categories" class="text-black ml-auto mt-4"> <i class="fa-solid fa-backward"></i> Back </a>
                </div>
            </form>
        </div>
    </x-padding-wrapper>
    @push('scripts')
        <script>
          document.addEventListener("alpine:init", () => {
          Alpine.data("multiselect", () => ({
            style: {
              wrapper: "w-full relative",
              select:
                "border w-full border-gray-300 rounded-lg py-2 px-2 text-sm flex gap-2 items-center cursor-pointer bg-white",
              menuWrapper:
                "w-full rounded-lg py-1.5 text-sm mt-1 shadow-lg absolute bg-white z-10",
              menu: "max-h-52 overflow-y-auto",
              textList: "overflow-x-hidden text-ellipsis grow whitespace-nowrap",
              trigger: "px-2 py-2 rounded bg-neutral-100",
              badge: "py-1.5 px-3 rounded-full bg-neutral-100",
              search:
                "px-3 py-2 w-full border-0 border-b-2 border-neutral-100 pb-3 outline-0 mb-1",
              optionGroupTitle:
                "px-3 py-2 text-neutral-400 uppercase font-bold text-xs sticky top-0 bg-white",
              clearSearchBtn: "absolute p-3 right-0 top-1 text-neutral-600",
              label: "hover:bg-neutral-50 cursor-pointer flex py-2 px-3"
            },

            icons: {
              times:
                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><g xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="M6 18L18 6M18 18L6 6"/></g></svg>',
              arrowDown:
                '<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-4 h-4"><path xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-width="2" d="M5 10l7 7 7-7"/></svg>'
            },

            init() {
              const style = this.style;

              const originalSelect = this.$el;
              originalSelect.classList.add("hidden");

              const wrapper = document.createElement("div");
              wrapper.className = style.wrapper;
              wrapper.setAttribute("x-data", "newSelect");

              const newSelect = document.createElement("div");
              newSelect.className = style.select;
              newSelect.setAttribute("x-bind", "selectTrigger");

              const textList = document.createElement("span");
              textList.className = style.textList;

              const triggerBtn = document.createElement("anchor");
              triggerBtn.className = style.trigger;
              triggerBtn.innerHTML = this.icons.arrowDown;

              const countBadge = document.createElement("span");
              countBadge.className = style.badge;
              countBadge.setAttribute("x-bind", "countBadge");

              newSelect.append(textList);
              newSelect.append(countBadge);
              newSelect.append(triggerBtn);

              const menuWrapper = document.createElement("div");
              menuWrapper.className = style.menuWrapper;
              menuWrapper.setAttribute("x-bind", "selectMenu");

              const menu = document.createElement("div");
              menu.className = style.menu;

              const search = document.createElement("input");
              search.className = style.search;
              search.setAttribute("x-bind", "search");
              search.setAttribute("placeholder", "Filter Door Categories");

              const clearSearchBtn = document.createElement("anchor");
              clearSearchBtn.className = style.clearSearchBtn;
              clearSearchBtn.setAttribute("x-bind", "clearSearchBtn");
              clearSearchBtn.innerHTML = this.icons.times;

              menuWrapper.append(search);
              menuWrapper.append(menu);
              menuWrapper.append(clearSearchBtn);

              originalSelect.parentNode.insertBefore(
                wrapper,
                originalSelect.nextSibling
              );

              const itemGroups = originalSelect.querySelectorAll("optgroup");

              if (itemGroups.length > 0) {
                itemGroups.forEach((itemGroup) => processItems(itemGroup));
              } else {
                processItems(originalSelect);
              }

              function processItems(parent) {
                const items = parent.querySelectorAll("option");
                const subMenu = document.createElement("ul");
                const groupName = parent.getAttribute("label") || null;

                if (groupName) {
                  const groupTitle = document.createElement("h5");
                  groupTitle.className = style.optionGroupTitle;
                  groupTitle.innerText = groupName;
                  groupTitle.setAttribute("x-bind", "groupTitle");
                  menu.appendChild(groupTitle);
                }

                items.forEach((item) => {
                  const li = document.createElement("li");
                  li.setAttribute("x-bind", "listItem");

                  const checkBox = document.createElement("input");
                  checkBox.classList.add("mr-3", "mt-1");
                  checkBox.type = "checkbox";
                  checkBox.value = item.value;
                  checkBox.id = originalSelect.name + "_" + item.value;

                  const label = document.createElement("label");
                  label.className = style.label;
                  label.setAttribute("for", checkBox.id);
                  label.innerText = item.innerText;

                  checkBox.setAttribute("x-bind", "checkBox");

                  if (item.hasAttribute("selected")) {
                    checkBox.checked = true;
                  }
                  label.prepend(checkBox);
                  li.append(label);
                  subMenu.appendChild(li);
                });
                menu.appendChild(subMenu);
              }

              wrapper.appendChild(newSelect);
              wrapper.appendChild(menuWrapper);

              Alpine.data("newSelect", () => ({
                open: false,
                showCountBadge: false,
                items: [],
                selectedItems: [],
                filterBy: "",
                init() {
                  this.regenerateTextItems();
                },

                regenerateTextItems() {
                  this.selectedItems = [];
                  this.items.forEach((item) => {
                    const checkbox = item.querySelector("input[type=checkbox]");
                    const text = item.querySelector("label").innerText;
                    if (checkbox.checked) {
                      this.selectedItems.push(text);
                    }
                  });

                  if (this.selectedItems.length > 1) {
                    this.showCountBadge = true;
                  } else {
                    this.showCountBadge = false;
                  }

                  if (this.selectedItems.length === 0) {
                    textList.innerHTML = '<span class="text-neutral-400">Door Categories</span>';
                  } else {
                    textList.innerText = this.selectedItems.join(", ");
                  }
                },

                selectTrigger: {
                  ["@click"]() {
                    this.open = !this.open;

                    if (this.open) {
                      this.$nextTick(() =>
                        this.$root.querySelector("input[x-bind=search]").focus()
                      );
                    }
                  }
                },
                selectMenu: {
                  ["x-show"]() {
                    return this.open;
                  },
                  ["x-transition"]() {},
                  ["@keydown.escape.window"]() {
                    this.open = false;
                  },
                  ["@click.away"]() {
                    this.open = false;
                  },
                  ["x-init"]() {
                    this.items = this.$el.querySelectorAll("li");
                    this.regenerateTextItems();
                  }
                },
                checkBox: {
                  ["@change"]() {
                    const checkBox = this.$el;

                    if (checkBox.checked) {
                      originalSelect
                        .querySelector("option[value='" + checkBox.value + "']")
                        .setAttribute("selected", true);
                    } else {
                      originalSelect
                        .querySelector("option[value='" + checkBox.value + "']")
                        .removeAttribute("selected");
                    }
                    this.regenerateTextItems();
                  }
                },
                countBadge: {
                  ["x-show"]() {
                    return this.showCountBadge;
                  },
                  ["x-text"]() {
                    return this.selectedItems.length;
                  }
                },
                search: {
                  ["@keydown.escape.stop"]() {
                    this.filterBy = "";
                    this.$el.blur();
                  },
                  ["@keyup"]() {
                    this.filterBy = this.$el.value;
                  },
                  ["x-model"]() {
                    return this.filterBy;
                  }
                },
                clearSearchBtn: {
                  ["@click"]() {
                    this.filterBy = "";
                  },
                  ["x-show"]() {
                    return this.filterBy.length > 0;
                  }
                },
                listItem: {
                  ["x-show"]() {
                    return (
                      this.filterBy === "" ||
                      this.$el.innerText
                        .toLowerCase()
                        .startsWith(this.filterBy.toLowerCase())
                    );
                  }
                },
                groupTitle: {
                  ["x-show"]() {
                    if (this.filterBy === "") return true;

                    let atLeastOneItemIsShown = false;

                    this.$el.nextElementSibling
                      .querySelectorAll("li")
                      .forEach((item) => {
                        console.log(this.filterBy);
                        if (
                          item.innerText
                            .toLowerCase()
                            .startsWith(this.filterBy.toLowerCase())
                        )
                          atLeastOneItemIsShown = true;
                      });
                    return atLeastOneItemIsShown;
                  }
                }
              }));
            }
          }));
        });
        document.addEventListener('alpine:init', () => {
          Alpine.data('imgPreview', () => ({
            imgsrc:null,
            previewFile() {
                let file = this.$refs.myFile.files[0];
                if(!file || file.type.indexOf('image/') === -1) return;
                this.imgsrc = null;
                let reader = new FileReader();
                reader.onload = e => {
                    this.imgsrc = e.target.result;
                }
                reader.readAsDataURL(file);
            }
          }))
        });
        </script>
    @endpush
</x-layout>

