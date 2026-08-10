import time
from src.main import setup_db, process_users

def run_benchmark():
    num_users = 1000
    print(f"Setting up database with {num_users} users...")
    session, engine = setup_db(num_users=num_users)

    print("Starting benchmark...")
    start_time = time.time()

    # Run the function multiple times to get a better average if it's very fast,
    # but since it's N+1, one run of 1000 users should be measurable enough.
    iterations = 5
    total_time = 0

    for _ in range(iterations):
        iter_start = time.time()
        profiles_fetched = process_users(session)
        iter_end = time.time()

        iter_duration = iter_end - iter_start
        total_time += iter_duration
        print(f"Iteration completed in {iter_duration:.4f} seconds, fetched {profiles_fetched} profiles.")

    avg_time = total_time / iterations
    print(f"\nAverage time per process_users call: {avg_time:.4f} seconds")

    session.close()

if __name__ == "__main__":
    run_benchmark()
