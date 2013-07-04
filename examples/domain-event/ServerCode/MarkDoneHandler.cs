using System;
using NGS.DomainPatterns;
using Todo;

namespace ServerCode
{
	public class MarkDoneHandler : IDomainEventHandler<MarkDone>
	{
		private readonly IPersistableRepository<Task> Repository;

		public MarkDoneHandler(IPersistableRepository<Task> repository)
		{
			this.Repository = repository;
		}

		public void Handle(MarkDone domainEvent)
		{
			var task = Repository.Find(domainEvent.taskURI);
			if (task == null)
				throw new ArgumentException("Cant find task with uri: " + domainEvent.taskURI);
			if (task.isDone)
				throw new ArgumentException("Task " + task.name + " is already marked as done!");
			task.isDone = true;
			Repository.Update(task);
		}
	}
}
