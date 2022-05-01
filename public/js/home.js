function truncate(input, length = 5) {
    if (input.length > length) {
        return input.substring(0, length) + "...";
    }
    return input;
}

async function fetchTopics() {
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr("content"),
        },
    });

    let topics;
    await jQuery.ajax({
        type: "GET",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("AUTH_TOKEN"),
        },
        url: "http://localhost:8000/api/topics",
        dataType: "json",

        success: function (data) {
            if (data) topics = data;
        },
        error: function (error) {
            console.log(error.responseJSON);
        },
    });
    return topics;
}

async function fetchEntries() {
    jQuery.ajaxSetup({
        headers: {
            "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr("content"),
        },
    });

    let entries;
    await jQuery.ajax({
        type: "GET",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("AUTH_TOKEN"),
        },
        url: "http://localhost:8000/api/entries",
        dataType: "json",

        success: function (data) {
            if (data) entries = data;
        },
        error: function (error) {
            console.log(error.responseJSON);
        },
    });
    return entries;
}

jQuery(document).ready(async function () {
    const topicId = window.location.pathname.split("/")[2];
    const isTopicPage = !isNaN(topicId);

    const topics = await fetchTopics();
    const entries = await fetchEntries();
    const entryList = entries.map((e) => ({
        ...e,
        topic: topics.find((t) => t.id === e.topicid),
    }));

    if (topics) {
        const topicsHtml = topics.map(
            (topic) =>
                `<a href="/topic/${topic.id}" class="block py-2 px-2 hover:bg-gray-200 rounded-sm cursor-pointer mt-2">${topic.topicname}</a>`
        );
        jQuery("#topics").html(topicsHtml);
    }
    if (entryList) {
        if (isTopicPage) {
            const topicEntries = entryList.filter(
                (e) => e.topic.id === parseInt(topicId)
            );
            if (!topicEntries.length) {
                jQuery("#entries").html("Bu gündeme ait yorum yok.");
            }
            const topicHeader = `<a href="/topic/${topicEntries[0].topic.id}" class="text-2xl font-semibold text-gray-800 hover:underline cursor-pointer">
                ${topicEntries[0].topic.topicname}
            </a>`;
            const topicDetailEntries = topicEntries.map(
                (entry, i) => `
                ${
                    i !== 0
                        ? '<div class="my-8 border-t-2 border-gray-200"></div>'
                        : ""
                }
                        <p class="max-w-lg text-md text-gray-700 mt-4">
                ${entry.entry}
            </p>
            <p class="text-right text-gray-800 mt-4">${entry.user.name}</p>
            <p class="text-right text-xs text-gray-500 mt-2">${dayjs(
                entry.created_at
            ).format("DD.MM.YYYY HH:mm")}</p>
        `
            );
            jQuery("#entries").html([topicHeader, ...topicDetailEntries]);
            return;
        }

        const homeEntries = _.uniq(entryList, (i) => i.topic.id).map(
            (entry, i) => `${
                i !== 0
                    ? '<div class="my-8 border-t-2 border-gray-200"></div>'
                    : ""
            }
							<a href="/topic/${
                                entry.topic.id
                            }" class="text-2xl font-semibold text-gray-800 hover:underline cursor-pointer">
								${entry.topic.topicname}
							</a>

							<p  class="max-w-lg text-md text-gray-700 mt-4">
								${truncate(entry.entry, 150)}
							</p>
                            <p class="text-right text-gray-800 mt-4">${
                                entry.user.name
                            }</p>
                            <p class="text-right text-xs text-gray-500 mt-2">${dayjs(
                                entry.created_at
                            ).format("DD.MM.YYYY HH:mm")}</p>
						`
        );
        jQuery("#entries").html(homeEntries);
    }
});
