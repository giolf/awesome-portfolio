export default {
    setProjectsList(state, projects) {
        projects.forEach(project => {
            state.projects.push(project);
        });
    }
};
